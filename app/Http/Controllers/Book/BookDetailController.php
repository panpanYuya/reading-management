<?php

namespace App\Http\Controllers\Book;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StickyRequest;
use App\Services\BookService;
use App\Models\StickyRegistration;
use App\Models\UserBook;


class BookDetailController extends Controller
{
    /**
     * 図書詳細画面を表示する機能
     *
     * @param string $apiId
     * @return view
     */
    public function showDetail($id){
        $bookDetail = DB::table('user_books')
            ->join('books', 'user_books.book_id', '=', 'books.id')
            ->where([
                ['user_books.id', $id],
                ['user_books.user_id', Auth::id()],
            ])->first();
        if(!isset($bookDetail)){
            abort(401);
        }
        $stickyNotes = StickyRegistration::where('user_book_id', $bookDetail->id)->get();
        if(!isset($bookDetail)){
            abort(404);
        }
        return view('book.detail', compact('bookDetail', 'stickyNotes'));
    }

    public function addStickyNote(StickyRequest $request){
        $userBook = UserBook::find($request->userBookId);
        //本のページを登録する。
        if($userBook->user_id != Auth::id()){
            return response()->json([
                'message' => '登録ができませんでした'
            ], 401);
        }
        $formattedMemo = BookService::newLineCodeToRegexp($request->stickyMemo);
        try {
            $sticky = new StickyRegistration;
            $sticky->user_book_id = $userBook->id;
            $sticky->page_number = $request->pageNumber;
            $sticky->sticky_title = $request->stickyTitle;
            $sticky->sticky_memo = $formattedMemo;

            $sticky->save();
        } catch (Exception $e) {
            abort(500);
        }
        return response()->json([
            'message' => '登録に成功しました'
        ], 200);
    }


    public function updateStickyNote(StickyRequest $request){
        $stickyNote = StickyRegistration::where(
            ['id' => $request->stickyId],
            ['user_book_id' => $request->userBookId]
        )->firstOrFail();
        $userBook = UserBook::find($request->userBookId);
        if ($userBook->user_id != Auth::id()) {
            return response()->json([
                'message' => '編集ができませんでした'
            ], 401);
        }

        $formattedMemo = BookService::newLineCodeToRegexp($request->stickyMemo);
        try {
            $stickyNote->page_number = $request->pageNumber;
            $stickyNote->sticky_title = $request->stickyTitle;
            $stickyNote->sticky_memo = $formattedMemo;
            $stickyNote->save();
        } catch (Exception $e) {
            abort(500);
        }
        return response()->json([
            'message' => '登録に成功しました'
        ], 200);

    }

    public function deleteStickyNote(Request $request){
        $userBook = UserBook::find($request->userBookId);
        if ($userBook->user_id != Auth::id()) {
            return response()->json([
                'message' => '削除ができませんでした'
            ], 401);
        }
        StickyRegistration::findOrFail($request->stickyId)->delete();
        return response()->json([
            'message' => '削除に成功しました。'
        ], 200);
    }


}
