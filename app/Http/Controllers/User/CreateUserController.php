<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Controllers\Controller;
use App\Mails\RegistVerificationMail;
use App\Models\TemporaryRegistration;
use App\Models\UserAuth;
use App\Services\UserService;
use Carbon\Carbon;
use Exception;

class CreateUserController extends Controller
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
            return view('user.auth.create-complete');


        //メールアドレス有で登録
        } else {
            //認証用のtokenを発行する。
            $temporaryToken = UserService::generateToken();
            try {
                TemporaryRegistration::updateOrCreate(
                    ['mail_address' => $request->mailAddress],
                    [
                        'user_name' => $request->user_name,
                        'password' => $hashedPassword,
                        'temporary_token' => $temporaryToken,
                    ]
                );
                $registUrl = config('app.url') . \UserConst::USER_REGIST_URL . $temporaryToken;
                Mail::to($request->mailAddress)->send(new RegistVerificationMail($request->user_name,$registUrl) );
            } catch (Exception $e) {
                abort(500);
            }
            return view('user.auth.create-tmp-complete');

        }

    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function authEmail(Request $request){
        $token = $request->token;
        try{
            $tmpInfo = TemporaryRegistration::where('temporary_token', $token)->first();
        } catch (Exception $e) {
            abort(500);
        }
        if ($tmpInfo == NULL) {
            abort(500);
        }
        $deadLine = $tmpInfo->updated_at;
        $deadLine->addHour(24);
        if (Carbon::now() < $deadLine) {
            try{
                $authEmailForm = $this->authEmailForm($tmpInfo);
                $authEmailForm->save();
                $tmpInfo->delete();
            } catch (Exception $e){
                abort(500);
            }
            return view('user.auth.create-complete');
        } else {
            $tmpInfo->delete();
            $message = \UserConst::USER_CREATE_FAIL_MESSAGE;
            return view('user.auth.expired', compact('message'));
        }
    }


    /**
     * ユーザー認証テーブル登録用フォームを作成する関数
     *
     * @param Request $request
     * @param String $hashedPassword
     * @return UserAuth　$userAuth
     */
    public function userAuthForm(Request $request, $hashedPassword)
    {
        $userAuth = new UserAuth();
        $userAuth->user_name = $request->user_name;
        $userAuth->mail_address = $request->mail_address;
        $userAuth->password = $hashedPassword;

        return $userAuth;
    }



    public function authEmailForm(TemporaryRegistration $tmpInfo)
    {
        $userAuth = new UserAuth();
        $userAuth->user_name = $tmpInfo->user_name;
        $userAuth->mail_address = $tmpInfo->mail_address;
        $userAuth->password = $tmpInfo->password;

        return $userAuth;
    }

}
