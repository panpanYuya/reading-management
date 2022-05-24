<?php

namespace App\Http\Controllers\Book;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\StickyRegistration;
use App\Models\UserBook;
use App\Rules\Space;


class DetailController extends Controller
{
    /**
     * 図書詳細画面を表示する機能
     *
     * @param string $apiId
     * @return view
     */
    protected $userId =1;
    public function showDetail($id){
        //TODOユーザー機能実装後に修正を加える。

        $bookDetail = DB::table('user_books')
            ->join('books', 'user_books.book_id', '=', 'books.id')
            ->where([
                ['user_books.id', $id],
                ['user_books.user_id', $this->userId],
            ])->first();
        $stickyNotes = StickyRegistration::where('user_book_id', $bookDetail->id)->get();
        if(!isset($bookDetail)){
            abort(404);
        }
        return view('book.bookDetail', compact('bookDetail', 'stickyNotes'));
    }

    public function addStickyNote(Request $request){
        $request->validate([
            'userBookId' => ['required', 'integer'],
            'stickyId' => ['nullable', 'integer'],
            'pageNumber' => ['nullable', 'integer', new Space],
            'stickyTitle' => ['nullable', 'string', 'max:100', new Space],
            'stickyMemo' => ['string', 'max:400', new Space],
        ]);
        $userBook = UserBook::find($request->userBookId);
        //本のページを登録する。
        try {
            $sticky = new StickyRegistration;
            $sticky->user_book_id = $userBook->id;
            $sticky->page_number = $request->pageNumber;
            $sticky->sticky_title = $request->stickyTitle;
            $sticky->sticky_memo = $request->stickyMemo;

            $sticky->save();
        } catch (Exception $e) {

            abort(500);
        }
        return response()->json([
            'message' => '登録に成功しました'
        ], 200);

    }


    public function updateStickyNote(Request $request){
        $request->validate([
            'userBookId' => ['required', 'integer'],
            'stickyId' => ['nullable', 'integer'],
            'pageNumber' => ['nullable', 'integer', new Space],
            'stickyTitle' => ['nullable', 'string', 'max:100', new Space],
            'stickyMemo' => ['string', 'max:400', new Space],
        ]);
        $stickyNote = StickyRegistration::find($request->stickyId);
        //TODO　ユーザー機能実装後に修正する。
        $stickyNote = StickyRegistration::where(
            ['id' => $request->stickyId],
            ['user_book_id' => 1]
        )->firstOrFail();
        //本のページを登録する。
        try {
            $stickyNote->page_number = $request->pageNumber;
            $stickyNote->sticky_title = $request->stickyTitle;
            $stickyNote->sticky_memo = $request->stickyMemo;
            $stickyNote->save();
        } catch (Exception $e) {

            abort(500);
        }
        return response()->json([
            'message' => '登録に成功しました'
        ], 200);

    }


}
