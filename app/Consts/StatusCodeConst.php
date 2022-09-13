<?php

namespace App\Consts;

/**
 * HTTPのステータスコードの定数を格納しているクラス
 */
class StatusCodeConst
{


    //正常系ステータスコード
    const ALL_CORRECT_NUM = 200;

    //エラー系ステータスコード
    const UNAUTHORIZED_ERROR_NUM = 401;
    const NOT_FOUND_ERROR_NUM = 404;
    const INTERNAL_SERVER_ERROR_NUM = 500;


}
