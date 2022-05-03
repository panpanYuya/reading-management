<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRegistration;
use App\Services\BookService;
use App\Services\ApiService;

class searchBookController extends Controller
{
    //
    public function searchBook(Request $request){

        $keywords = BookService::trimKeywords($request->keyword);

        $results = ApiService::serachBookApi($keywords);


        $resultBooks = $this->searchBookForm($results);

        // dd($resultBooks);
        return view('/book/bookSearch', compact('resultBooks'));
    }

    public function searchBookForm($jsonResults)
    {
        $searchResult = json_decode($jsonResults, false, 10);

        // dd($searchResult);
        foreach ($searchResult->items as $item) {
            $book = new BookRegistration();
            // dd($item);
            $book->id = $item->id;
            if (property_exists($item->volumeInfo, 'title')) {
                $book->title = $item->volumeInfo->title;
            }
            if (property_exists($item->volumeInfo, 'authors')) {
                $authors = $item->volumeInfo->authors;
                // dd($authors);
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
            if (property_exists($item->volumeInfo, 'imageLinks')) {
                $book->book_cover_url = $item->volumeInfo->imageLinks->smallThumbnail;
            }
            $showBooks[] = $book;
            // dd($book);
        }
        return $showBooks;
    }
}
