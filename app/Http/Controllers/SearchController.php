<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchBookRequest;
use App\Models\Book;
use App\Services\BookService;
use App\Services\ApiService;

class SearchBookController extends Controller
{
    //
    public function searchBook(SearchBookRequest $request)
    {

        $keyword = $request->keyword;
        $keywords = BookService::trimKeywords($request->keyword);

        $results = ApiService::serachBookApi($keywords);
        if ($results->getStatusCode() != 200) {
            abort(500);
        }

        $resultBooks = $this->searchBookForm($results);

        return view('book.search', compact('keyword', 'resultBooks'));
    }

    public function searchBookForm($jsonResults)
    {
        $searchResult = json_decode($jsonResults, false, 10);

        foreach ($searchResult->items as $item) {
            $book = new Book();

            //apiのユニークidを変数に格納。
            $book->api_id = $item->id;
            //apiから取得した本のタイトルを代入する
            if (property_exists($item->volumeInfo, 'title')) {
                $book->title = $item->volumeInfo->title;
            }
            //apiから取得した本の著者名を代入
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
            $showBooks[] = $book;
        }
        return $showBooks;
    }
}
