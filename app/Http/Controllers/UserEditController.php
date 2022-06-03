<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\UserAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\UserService;
use App\Models\TemporaryRegistration;
use App\Mail\RegistVerificationMail;
use Carbon\Carbon;
use Exception;

class UserEditController extends Controller
{

    protected $testMail = 'test@test.com';
    /**
     *  ユーザー情報変更画面を表示する関数
     *
     * @param Request $request
     * @return view
     */
    public function edit(Request $request)
    {
        $userInfo = UserAuth::find(Auth::id());
        return view('user.edit.user_info-edit', compact('userInfo'));
    }

    /**
     * ユーザー情報変更処理
     * メールアドレスの値が変更された場合は仮登録を行う。
     * メールアドレス以外の値が変更された場合はユーザー認証テーブルの値を直接変更する。
     *
     * @param UpdateUserRequest $request
     * @return view
     */
    public function update(UpdateUserRequest $request)
    {
        $userInfo = UserAuth::find(Auth::id());
        $temporaryToken = UserService::generateToken();
        $hashedPassword ="";
        if($request->password != NULL){
            $hashedPassword = UserService::PasswordHash($request->password);
        } else {
            $hashedPassword = $userInfo->password;
        }
        if ($request->mailAddress != $userInfo->mail_address && $request->mailAddress != NULL) {
            try {
                //仮登録テーブルに情報を登録する。
                $tmpRegistrationForm = $this->temporaryRegistrationForm($request, $hashedPassword, $temporaryToken);
                $tmpRegistrationForm->save();
                $registUrl = config('app.url') . \UserConst::USER_UPDATE_EMAIL_URL . $temporaryToken;
                Mail::to($this->testMail)->send(new RegistVerificationMail($tmpRegistrationForm, $registUrl));
            } catch (Exception $e) {
                abort(500);
            }
            return view('/user/userAuthCreateTmpComplete');
        } else{
            try {
                $userInfo->user_name = $request->user_name;
                $userInfo->password = $hashedPassword;
                $userInfo->mail_address = $request->mailAddress;
                $userInfo->save();
            } catch (Exception $e) {
                abort(500);
            }
            return view('.user.edit.user_info-edit-complite');
        }
    }

    /**
     *ユーザー情報更新時に変更されたメールアドレスを認証する。
     *
     * @param Request $request
     * @return view
     */
    public function updateAuthEmail(Request $request)
    {
        $token = $request->token;
        $tmpInfo = TemporaryRegistration::where('temporary_token', $token)->first();
        $deadLine = $tmpInfo->created_at;
        $deadLine->addHour(24);
        if (Carbon::now() < $deadLine) {
            try {
                $authEmailForm = $this->updateAuthEmailForm($tmpInfo);
                $authEmailForm->save();
                $tmpInfo->delete();
            } catch (Exception $e) {
                abort(500);
            }
            return view('user.edit.user_info-edit-complite');
        } else {
            $tmpInfo->delete();
            $message = \UserConst::USER_EDIT_FAIL_MESSAGE;
            return view('.user.auth-expired', compact('message'));
        }
    }

    /**
     * ユーザー認証テーブル登録用フォームを作成する関数
     *
     * @param Request $request
     * @param String $hashedPassword
     * @return UserAuth　$userAuth
     */
    public function updateAuthEmailForm(TemporaryRegistration $tmpInfo)
    {
        $userAuth = UserAuth::find($tmpInfo->user_id);
        $userAuth->user_name = $tmpInfo->user_name;
        $userAuth->mail_address = $tmpInfo->password;
        $userAuth->mail_address = $tmpInfo->mail_address;

        return $userAuth;
    }

    /**
     * 仮登録テーブル登録用フォームを作成する関数
     *
     * @param Request $request
     * @param String $hashedPassword
     * @param String $temporaryToken
     * @return TemporaryRegistration　$tmpRegistrationForm
     */
    public function temporaryRegistrationForm(Request $request, $hashedPassword, $temporaryToken)
    {
        $tmpRegistrationForm = new TemporaryRegistration();
        $tmpRegistrationForm->user_id = Auth::id();
        $tmpRegistrationForm->user_name = $request->user_name;
        $tmpRegistrationForm->mail_address = $request->mailAddress;
        $tmpRegistrationForm->password = $hashedPassword;
        $tmpRegistrationForm->temporary_token = $temporaryToken;
        return $tmpRegistrationForm;
    }
}