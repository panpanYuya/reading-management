<?php

namespace App\Http\Controllers;

use App\Consts\StatusCodeConst;
use App\Consts\TimeConst;
use App\Models\UserAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\User\SendEmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\UserService;
use App\Mails\ResetPasswordMail;
use App\Models\TemporaryRegistration;
use Carbon\Carbon;
use Exception;

class PasswordController extends Controller
{

    //
    public function sendPasswordEmail(SendEmailRequest $request){
        try{
            $userInfo = UserAuth::where('mail_address', $request->mailAddress)->first();
        } catch (Exception $e) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }
        if(is_null($userInfo)){
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }
        $temporaryToken = UserService::generateToken();
        try{
            TemporaryRegistration::updateOrCreate(
                ['mail_address' => $userInfo->mail_address],
                [
                    'user_id' => $userInfo->id,
                    'user_name' => $userInfo->user_name,
                    'password' => $userInfo->password,
                    'temporary_token' => $temporaryToken,
                ]
            );
            $registUrl = config('app.url') . \UserConst::USER_RESET_PASSWORD_URL . $temporaryToken;
            Mail::to($request->mailAddress)->send(new ResetPasswordMail($registUrl));
        } catch (Exception $e) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }
        return view('password.send-mail');
    }

    public function editPassword(Request $request)
    {
        $token = $request->token;
        try{
            $tmpInfo = TemporaryRegistration::where('temporary_token', $token)->first();
        } catch (Exception $e){
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }
        if ($tmpInfo == NULL) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }
        $deadLine = $tmpInfo->updated_at;
        $deadLine->addHour(TimeConst::DAY_IN_HOURS_NUM);
        if (Carbon::now() < $deadLine) {
            $userId = $tmpInfo->user_id;
            return view('password.change', compact('userId'));
        } else {
            $tmpInfo->delete();
            $message = \UserConst::USER_CREATE_FAIL_MESSAGE;
            return view('user.auth.expired', compact('message'));
        }
    }

    public function updatePassword(ResetPasswordRequest $request)
    {
        $userInfo = UserAuth::find($request->userId);
        //hash化した値を格納する。
        $hashedPassword = UserService::PasswordHash($request->password);
        try {
            //TODO ここにユーザー認証テーブルに登録するためのformを作成すれば、ＯＫ
            $userInfo->password = $hashedPassword;
            $userInfo->save();
            $tmpInfo = TemporaryRegistration::where('user_id', $userInfo->id)->first();
            $tmpInfo->delete();
        } catch (Exception $e) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }
        return view('password.change-complete');
    }


    /**
     * 仮登録テーブル登録用フォームを作成する関数
     *
     * @param Request $request
     * @param String $hashedPassword
     * @param String $temporaryToken
     * @return TemporaryRegistration　$tmpRegistrationForm
     */
    public function temporaryRegistrationForm(UserAuth $userInfo,$temporaryToken)
    {
        $tmpRegistrationForm = new TemporaryRegistration();
        $tmpRegistrationForm->user_id = $userInfo->id;
        $tmpRegistrationForm->user_name = $userInfo->user_name;
        $tmpRegistrationForm->mail_address = $userInfo->mail_address;
        $tmpRegistrationForm->password = $userInfo->password;
        $tmpRegistrationForm->temporary_token = $temporaryToken;
        return $tmpRegistrationForm;
    }

}
