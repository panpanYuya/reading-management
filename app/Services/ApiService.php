<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;




class ApiService {

    //apiの共通化はタスク番号を振って修正する。チケット番号1041
    //理由:フィールド変数で宣言するとstaticメソッドでは呼び出せない為。

    static public function serachBookApi($keywords){
        $apiUrl = 'https://www.googleapis.com/books/v1/volumes?q=';
        for ($i = 0; $i < count($keywords); $i++) {
            if($i + 1 == count($keywords)){
                $apiUrl .= $keywords[$i];
            } else {
                $apiUrl .= $keywords[$i] . "+";
            }
        }
        return Http::get($apiUrl);
    }

    static public function findBookApi($id){
        $apiUrl = 'https://www.googleapis.com/books/v1/volumes/';
        return Http::get($apiUrl . $id);
    }

}
