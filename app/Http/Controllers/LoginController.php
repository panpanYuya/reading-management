<?php

namespace App\Http\Controllers;

use App\Models\UserAuth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            //この後loginの際に使用したユーザー名からユーザーidを取得して、ユーザーidにひもづく本棚ページを表示するように記述する。
            //本棚英語 bookshelf
            echo 'success';
            return view('/user/userAuthCreateComplete');
        }
        echo 'fail';
        return view('/user/userAuthCreateTmpComplete');
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
}
