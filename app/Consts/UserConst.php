<?php

namespace App\Consts;


class UserConst
{

    //認証用メールに添付するURL
    const USER_REGIST_URL = '/user/regist?token=';
    const USER_UPDATE_EMAIL_URL = '/user/update/email?token=';
    const USER_RESET_PASSWORD_URL = '/password/edit?token=';

    const USER_CREATE_FAIL_MESSAGE = '新規登録画面から再度お試し下さい。';
    const USER_EDIT_FAIL_MESSAGE = 'ユーザー情報変更画面から再度お試しください。';


    //仮登録時のトークン桁数
    const RANDOM_TOKEN_DIGITS = 16;

}
