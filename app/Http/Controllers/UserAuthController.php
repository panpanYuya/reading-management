<?php

namespace App\Http\Controllers;

use App\Models\UserAuth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreuserAuthRequest;
use App\Http\Requests\UpdateuserAuthRequest;
use App\Services\UserService;
use App\Http\Requests\UserAuthCompleteRequest;
use App\Models\TemporaryRegistration;
use App\Exceptions\InvalidOrderException;
use Exception;

class UserAuthController extends Controller{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createConfirm(StoreuserAuthRequest $request)
    {
        //hash化した値を格納する。
        $hashedPassword = UserService::PasswordHash($request->password);
        if ($request->mailAddress == NULL) {
            $userAuthForm = $this->userAuthForm($request, $hashedPassword);
            try {
                $userAuthForm->save();
            } catch (Exception $e) {
                abort(500);
            }
            return view('/user/userAuthCreateComplete');
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreuserAuthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreuserAuthRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userAuth  $userAuth
     * @return \Illuminate\Http\Response
     */
    public function show(UserAuth $userAuth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userAuth  $userAuth
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAuth $userAuth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserAuthRequest  $request
     * @param  \App\Models\UserAuth  $userAuth
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateuserAuthRequest $request, UserAuth $userAuth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAuth  $userAuth
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAuth $userAuth)
    {
        //
    }

    public function userAuthForm(Request $request, $hashedPassword){
        $userAuth = new UserAuth();
        $userAuth->userName = $request->userName;
        $userAuth->mailAddress = $request->mailAddress;
        $userAuth->password = $hashedPassword;

        return $userAuth;
    }

    public function temporaryRegistrationForm(Request $request, $hashedPassword,$temporaryToken){
        $tmpRegistrationForm = new TemporaryRegistration();
        $tmpRegistrationForm->user_name = $request->username;
        $tmpRegistrationForm->mail_address = $request->mailAddress;
        $tmpRegistrationForm->password = $hashedPassword;
        $tmpRegistrationForm->temporary_token = $temporaryToken;
        return $tmpRegistrationForm;
    }

}
