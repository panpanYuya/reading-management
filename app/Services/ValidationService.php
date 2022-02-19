<?php

namespace App\Services;

use Illuminate\Http\Request;
/**
 * validationのメソッドを格納しているファイル
 */
class ValidationService {
    /**
     * ユーザーを認証する時のバリデーションメソッド
     *
     */
    public static function userAuthValidation(Request $request){
        $validated = $request->validateWithBag('post', [
            'username' => ['required', 'unique:App\Models\userAuth,user_name', 'unique:App\Models\temporaryRegistration,user_name', 'min:8', 'max:20'],
            'password' => ['required', 'min:8', 'max:50'],
            'password_confirm' => ['required', 'min:8', 'max:50'],
            'email' => ['nullable', 'min:8', 'max:50']
        ]);
        return $validated;
    }


}
