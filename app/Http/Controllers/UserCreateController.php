<?php

namespace App\Http\Controllers;

use App\Models\UserAuth;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Services\UserService;
use App\Models\TemporaryRegistration;
use Exception;

class UserCreateController extends Controller
{
    /**
     * ユーザーを作成するメソッド
     *
     * @param UserCreateRequest $request
     * @return view
     */
    public function createUser(UserCreateRequest $request){


        //2重送信防止
        $request->session()->regenerateToken();

        //hash化した値を格納する。
        $hashedPassword = UserService::PasswordHash($request->password);


        //メールアドレスなしで登録
        if ($request->mailAddress == NULL) {
            $userAuthForm = $this->userAuthForm($request, $hashedPassword);
            try {
                $userAuthForm->save();
            } catch (Exception $e) {
                abort(500);
            }
            return view('/user/userAuthCreateComplete');


        //メールアドレス有で登録
        } else {
            //認証用のtokenを発行する。
            $temporaryToken = UserService::generateToken();
            $tmpRegistrationForm = $this->temporaryRegistrationForm($request, $hashedPassword, $temporaryToken);
            try {
                $tmpRegistrationForm->save();
            } catch (Exception $e) {
                abort(500);
            }
            return view('/user/userAuthCreateTmpComplete');

        }

    }


    /**
     * ユーザー認証テーブル登録用フォームを作成するメソッド
     *
     * @param Request $request
     * @param String $hashedPassword
     * @return UserAuth　$userAuth
     */
    public function userAuthForm(Request $request, $hashedPassword)
    {
        $userAuth = new UserAuth();
        $userAuth->user_name = $request->user_name;
        $userAuth->mail_address = $request->mailAddress;
        $userAuth->password = $hashedPassword;

        return $userAuth;
    }


    /**
     * 仮登録テーブル登録用フォームを作成するメソッド
     *
     * @param Request $request
     * @param String $hashedPassword
     * @param String $temporaryToken
     * @return TemporaryRegistration　$tmpRegistrationForm
     */
    public function temporaryRegistrationForm(Request $request, $hashedPassword, $temporaryToken)
    {
        $tmpRegistrationForm = new TemporaryRegistration();
        $tmpRegistrationForm->user_name = $request->user_name;
        $tmpRegistrationForm->mail_address = $request->mailAddress;
        $tmpRegistrationForm->password = $hashedPassword;
        $tmpRegistrationForm->temporary_token = $temporaryToken;
        return $tmpRegistrationForm;
    }
}
