<?php

namespace App\Services;


class BookService
{

    /**
     * 入力されたキーワードから全角スペースと半角スペースを除き、キーワードを配列にして返却するメソッド
     *
     * @param String $keyword
     * @return array $keyword
     */
    static public function trimKeywords($keyword)
    {
        return preg_split("/[\p{Z}\p{Cc}]++/u", $keyword, $limit = 5);
    }
}
