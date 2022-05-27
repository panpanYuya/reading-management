<?php

namespace App\Http\Controllers;

use App\Models\UserAuth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function authenticate(LoginRequest $request){

        $credentials = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            //TODOloginの際に使用したユーザー名からユーザーidを取得して、ユーザーidにひもづく本棚ページを表示するように記述する。
            //user認証を行ったタイミングで下記のreturn viewも修正する。
            return view('/user/userAuthCreate');
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    protected function sendFailedLoginResponse(LoginRequest $request)
    {
        throw ValidationException::withMessages([
            'user_name' => [trans('auth.failed')],
        ]);
    }
}
