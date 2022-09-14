<?php

namespace App\Http\Controllers\Book;

use App\Consts\BookConst;
use App\Http\Controllers\Controller;
use App\Models\UserBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditBookController extends Controller
{
    public function showEditBook(Request $request){
        $userBookId = $request->userBookId;
        $userBook = DB::table('user_books')
            ->leftJoin('books', 'user_books.book_id', '=' , 'books.id')
            ->where('user_books.id', $userBookId)
            ->select(
                'user_books.id',
                'user_books.user_id',
                'user_books.book_id',
                'user_books.read_status',
                'books.book_cover_url',
                'books.title'
            )
            ->first();
        return view('book.edit', compact('userBook'));
    }

    public function changeStatus(Request $request){
        $userBookId= $request->userBookId;
        $userBook = UserBook::find($userBookId);
        $userBook->read_status = $request->bookStatus;
        $userBook->save();
        return response()->json([
            'updatedBookStatus' => $request->bookStatus,
        ], 200);
    }

    public function deleteBook(Request $request){
        $userBookId = $request->userBookId;
        $userBook = UserBook::find($userBookId);
        $userBook->delete();
        return redirect()->route('list', ['statusId' => BookConst::DEAFALUT_BOOK_STATUS]);
    }
}
