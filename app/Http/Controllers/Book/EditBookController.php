<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\UserBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditBookController extends Controller
{
    public function showEditBook(Request $request){
        $userBookId = $request->userBookId;
        $userBook = DB::table('user_books')
                        ->where('book_id', $userBookId)
                        ->leftJoin('books', 'user_books.book_id', '=' , 'books.id')
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
        return redirect('/book/list');
    }
}
