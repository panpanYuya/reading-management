<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRegistration;
use App\Services\BookService;
use App\Services\ApiService;

class BookController extends Controller
{
    //
    // public function search(Request $request){

    //     $keywords = BookService::trimKeywords($request->keyword);

    //     $results = ApiService::serachBookApi($keywords);


    //     return $results;
    // }


    public function searchBookForm($jsonResults){
        $searchResult = json_decode($jsonResults,true,10);
        $book = new BookRegistration();
        $book->id = $searchResult->items->id;
        $book->title = $searchResult->items->volumeInfo->title;
        $book->author = $searchResult->items->volumeInfo->authors;
        $book->book_cover_url = $searchResult->items->volumeInfo->selfLink;

    }


}
