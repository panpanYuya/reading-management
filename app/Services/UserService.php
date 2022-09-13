<?php

namespace App\Services;

use App\Consts\UserConst;
use Illuminate\Support\Facades\Hash;


class UserService {

    /**
     * passwordをhash化
     *
     * @return \Illuminate\Http\Response
     */
    public static function passwordHash(string $password){
        //
        return Hash::make($password);
    }

    /**
     * 16桁のランダムトークンを作成
     *
     * @return token
     */
    public static function generateToken(){
       return bin2hex(random_bytes(UserConst::RANDOM_TOKEN_DIGITS));
    }

}
