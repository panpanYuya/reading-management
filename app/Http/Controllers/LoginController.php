<?php

namespace App\Http\Controllers;

use App\Models\UserAuth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    protected $maxAttempts = 5;     // ログイン試行回数（回）
    protected $decayMinutes = 600;   // ログインロックタイム（分）

    public function authenticate(LoginRequest $request){

        $credentials = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);

        $this->ensureIsNotRateLimited($request);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('list');
        }
        else{
            RateLimiter::hit($this->throttleKey($request), $this->decayMinutes);
            $this->sendFailedLoginResponse();
        }
    }

    /**
     * ログインの試行回数をチェックする関数
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited($request)
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($request), $this->maxAttempts)) {
            return;
        }

        event(new Lockout($request));

        //試行回数が増えるまでの時間を返す。
        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'user_name' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey($request)
    {
        return $request->ip();
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * ユーザー認証テーブル登録用フォームを作成するメソッド
     *
     * @param Request $request
     * @param String $hashedPassword
     * @return UserAuth　$userAuth
     */
    public function userAuthForm(Request $request)
    {
        $userAuth = new UserAuth();
        $userAuth->user_name = $request->userName;
        $userAuth->password = $request->password;

        return $userAuth;
    }

    protected function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages([
            'user_name' => [trans('auth.failed')],
        ]);
    }
}
