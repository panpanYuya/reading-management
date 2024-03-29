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
        //5個以上のスペースはスルーする
        return preg_split("/[\p{Z}\p{Cc}]++/u", $keyword, 5);
    }

    /**
     * <wbr>を削除する処理
     *
     */
    static public function trimLinefeed($text){
        return preg_replace("/<wbr>/i", '', $text);
    }

    /**
     * 改行コードが重複していた場合、正規表現に直す処理
     *
     */
    static public function trimOverlapping($text){
        return preg_replace("/<br>\1+/", '<br>', $text);
    }

    /**
     *  改行コードを正規表現に修正する機能
     */
    static public function newLineCodeToRegexp($text){
        return preg_replace('/<br>/', "\n", $text);
    }
}
