<?php

namespace App\Consts;


class BookConst
{

    //図書一覧画面を表示する際、読書ステータスを使用しないで検索をする際に使用する。
    const DEAFALUT_BOOK_STATUS = '0';

    const READ_STATUS =  '1';
    const STATUS_READ_NAME =  '読んだ';
    const READWISH_STATUS =  '2';
    const STATUS_READWISH_NAME =  '読みたい';
    const UNREAD_STATUS =  '3';
    const STATUS_UNREAD_NAME =  '未読';

    const READ_STATUS_LIST = [
        self::STATUS_READ_NAME => self::READ_STATUS ,
        self:: STATUS_READWISH_NAME => self::READWISH_STATUS,
        self:: STATUS_UNREAD_NAME => self::UNREAD_STATUS
    ];
}
