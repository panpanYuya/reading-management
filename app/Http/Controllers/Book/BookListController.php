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
        $statusId = $request->statusId;
        if($statusId == \BookConst::READ_STATUS || $statusId == \BookConst::READWISH_STATUS || $statusId == \BookConst::UNREAD_STATUS){
            $userBooks = $this->findBookByStatusCode($statusId);
        } else{
            $userBooks = $this->findBookByCreated();
        }
        return view('book.list', compact('userBooks'));
    }

    public function findBookByCreated(){
        $userBooks = DB::table('user_books')->join('books', function ($join) {
            $join->on('user_books.book_id', '=', 'books.id')
                ->where('user_books.user_id', Auth::id());
        })->orderBy('user_books.created_at')->get();

        return $userBooks;
    }

    public function findBookByStatusCode($statusId){
        $userBooks = DB::table('user_books')
            ->join('books', 'user_books.book_id', '=', 'books.id')
            ->where([
                ['user_books.user_id', Auth::id()],
                ['user_books.read_status', $statusId],
            ])->orderBy('user_books.created_at')->get();
        return $userBooks;
    }

}
