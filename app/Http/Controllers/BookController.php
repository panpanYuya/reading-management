<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UserBook;
use App\Models\Book;
use App\Services\ApiService;
use App\Services\BookService;

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
        $resultBook = Book::firstOrCreate(
            ['api_id' => $book->id],
            [
                'book_cover_url' => $registBookForm->book_cover_url,
                'title' => $registBookForm->title,
                'author' => $registBookForm->author,
                'description' => $registBookForm->description
            ]
        );

        $bookId = $resultBook->id;
        $checkedBookStatus = $this->bookStatusCheck($request->bookStatus);
        UserBook::updateOrCreate(['user_id' => Auth::id(), 'book_id' => $bookId],['read_status' => $checkedBookStatus]);
        return response()->json([
            'message' => '登録に成功しました'
        ], 200);
    }

    public function showBooksList(Request $request){
        $userBooks = DB::table('user_books')->join('books', function($join){
            $join->on('user_books.book_id', '=', 'books.id')
            ->where('user_books.user_id', Auth::id());
        })->get();
        return view('book.booksList', compact('userBooks'));
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
            $trimDescription = BookService::trimLinefeed($book->volumeInfo->description);
            $trimDescription = BookService::trimOverlapping($trimDescription);
            $registBook->description = $trimDescription;
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
