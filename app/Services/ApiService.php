<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;




class ApiService {


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

}
