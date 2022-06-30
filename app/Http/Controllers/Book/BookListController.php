<?php

namespace App\Http\Controllers\Book;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookListController extends Controller
{

    public function showBooksList(Request $request)
    {
        $userBooks = DB::table('user_books')->join('books', function ($join) {
            $join->on('user_books.book_id', '=', 'books.id')
            ->where('user_books.user_id', Auth::id());
        })->get();
        return view('book.list', compact('userBooks'));
    }

}
