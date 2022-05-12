<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Models\BookRegistration;
use App\Services\ApiService;

class BookController extends Controller
{

    public function regist(Request $request){
        if(empty($request->bookId)){
            abort(500);
        }
        $jsonResults = ApiService::findBookApi($request->bookId);
        if($jsonResults->failed()){
            $apiErrorStatus = $jsonResults->status();
            abort($apiErrorStatus);
        }
        $book = json_decode($jsonResults, false, 10);
        $resultbook = BookRegistration::firstOrNew(['api_id' => $book->id]);
        if(!$resultbook->exists){
            try {
                $registBookForm = $this->registBookForm($book);
                $resultbook->api_id = $registBookForm->api_id;
                $resultbook->title =  $registBookForm->title;
                $resultbook->author = $registBookForm->author;
                $resultbook->book_cover_url = $registBookForm->book_cover_url ;
                $resultbook->description = $registBookForm->description ;

                $resultbook->save();
            } catch (Throwable $e){
                abort(500);

            }


        }
        //図書テーブルに登録する処理を書く

        //ユーザー図書テーブルに登録する機能を書く

    }

    public function registBookForm($book){
        $registBook = new BookRegistration();

        //apiのユニークidを変数に格納。
        $registBook->api_id = $book->id;
        //apiから取得した本のタイトルを代入する
        if (property_exists($book->volumeInfo, 'title')) {
            $registBook->title = $book->volumeInfo->title;
        }
        //apiから取得した本の著者名を代入
        if (property_exists($book->volumeInfo, 'authors')) {
            $authors = $book->volumeInfo->authors;
            for ($i = 0; $i < count($authors); $i++) {
                $author = "";
                if ($i + 1 == count($authors)) {
                    $author .= $authors[$i];
                } else {
                    $author .= $authors[$i] . ",";
                }
            }
            $registBook->author = $author;
        }
        //apiから取得した本のサムネイルを代入
        if (property_exists($book->volumeInfo, 'imageLinks')) {
            $registBook->book_cover_url = $book->volumeInfo->imageLinks->smallThumbnail;
        }
        if (property_exists($book->volumeInfo, 'description')) {
            $registBook->description = $book->volumeInfo->description;
        }
        return $registBook;
    }




}
