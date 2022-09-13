<?php

namespace App\Http\Controllers\Book;

use App\Consts\StatusCodeConst;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Book\SearchBookRequest;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\ResultBook;
use App\Services\BookService;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Models\UserBook;

class SearchBookController extends Controller
{
    //
    public function searchBooks(SearchBookRequest $request)
    {

        $keyword = $request->keyword;
        $keywords = BookService::trimKeywords($request->keyword);

        $results = ApiService::serachBookApi($keywords);
        if ($results->getStatusCode() != StatusCodeConst::ALL_CORRECT_NUM) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM);
        }

        $resultBooks = $this->searchBooksForm($results);

        return view('book.search', compact('keyword', 'resultBooks'));
    }

    public function registBook(Request $request)
    {

        if (empty($request->bookId)) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM, trans('error.server'));
        }
        $jsonResults = ApiService::findBookApi($request->bookId);
        if ($jsonResults->getStatusCode() != StatusCodeConst::ALL_CORRECT_NUM) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM, trans('error.server'));
        }
        if ($jsonResults->failed()) {
            $apiErrorStatus = $jsonResults->status();
            abort($apiErrorStatus, trans('error.server'));
        }
        $book = json_decode($jsonResults, false, 10);
        $registBookForm = $this->registBookForm($book);
        $apiId = $book->id;
        $resultBook = Book::firstOrCreate(
            ['api_id' => $apiId],
            [
                'book_cover_url' => $registBookForm->book_cover_url,
                'title' => $registBookForm->title,
                'author' => $registBookForm->author,
                'description' => $registBookForm->description
            ]
        );

        $bookId = $resultBook->id;
        $checkedBookStatus = $this->bookStatusCheck($request->bookStatus);
        UserBook::updateOrCreate(['user_id' => Auth::id(), 'book_id' => $bookId], ['read_status' => $checkedBookStatus]);
        return response()->json([
            'message' => '登録に成功しました',
            'bookId' => $apiId
        ], StatusCodeConst::ALL_CORRECT_NUM);
    }


    public function bookStatusCheck($bookStatus)
    {
        if ($bookStatus !== \BookConst::READ_STATUS_LIST['読んだ'] && $bookStatus !== \BookConst::READ_STATUS_LIST['読みたい']  && $bookStatus !== \BookConst::READ_STATUS_LIST['未読']) {
            $bookStatus = \BookConst::READWISH_STATUS;
        }
        return $bookStatus;
    }

    public function searchBooksForm($jsonResults)
    {
        $searchResult = json_decode($jsonResults, false, 10);

        foreach ($searchResult->items as $item) {
            $book = new ResultBook();

            //apiのユニークidを変数に格納。
            $book->api_id = $item->id;
            if (property_exists($item->volumeInfo, 'title')) {
                $book->title = $item->volumeInfo->title;
            }
            if (property_exists($item->volumeInfo, 'authors')) {
                $authors = $item->volumeInfo->authors;
                for ($i = 0; $i < count($authors); $i++) {
                    $author = "";
                    if ($i + 1 == count($authors)) {
                        $author .= $authors[$i];
                    } else {
                        $author .= $authors[$i] . ",";
                    }
                }
                $book->author = $author;
            }
            //apiから取得した本のサムネイルを代入
            if (property_exists($item->volumeInfo, 'imageLinks')) {
                $book->book_cover_url = $item->volumeInfo->imageLinks->smallThumbnail;
            }

            //すでに登録済みの本にはresultFlgにTrueを代入し、登録ボタンを押下できないようにする
            $userBook = DB::table('user_books')->where('user_id', Auth::id())->join('books', function ($join) {
                $join->on('user_books.book_id', '=', 'books.id');
            })->where('books.api_id', $book->api_id)->exists();
            if ($userBook) {
                $book->registFlg =  true;
            } else{
                $book->registFlg =  false;
            }

            $showBooks[] = $book;
        }
        return $showBooks;
    }

    public function registBookForm($book)
    {
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
}
