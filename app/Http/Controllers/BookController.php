<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBook;
use App\Models\Book;
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
        $registBookForm = $this->registBookForm($book);
        $resultBook = Book::updateOrCreate(
            ['api_id' => $book->id],
            [
                'book_cover_url' => $registBookForm->book_cover_url,
                'title' => $registBookForm->title,
                'author' => $registBookForm->author,
                'description' => $registBookForm->description
            ]
        );

        $bookId = $resultBook->id;

        //TODO ユーザー機能実装後に引数は変更する。
        $checkedBookStatus = $this->bookStatusCheck($request->bookStatus);
        UserBook::updateOrCreate(['user_id' => 1, 'book_id' => $bookId],['read_status' => $checkedBookStatus]);

        return response()->json([
            'message' => '登録に成功しました'
        ], 200);

    }

    public function showBooksList(Request $request){
        $userBooks = UserBook::where('user_id', 1)->with('book_registrations')->get();
        dd($userBooks);
    }

    public function registBookForm($book){
        $registBook = new Book();

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


    public function bookStatusCheck($bookStatus){
        if($bookStatus !== \BookConst::READ_STATUS_LIST['読んだ'] && $bookStatus !== \BookConst::READ_STATUS_LIST['読みたい']  && $bookStatus !== \BookConst::READ_STATUS_LIST['未読']){
            $bookStatus = \BookConst::READWISH_STATUS;
        }
        return $bookStatus;
    }




}
