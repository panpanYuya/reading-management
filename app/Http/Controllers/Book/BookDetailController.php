<?php

namespace App\Http\Controllers\Book;

use Exception;
use App\Consts\StatusCodeConst;
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
    public function showDetail($userBookId){
        $bookDetail = DB::table('user_books')
            ->leftJoin('books', 'user_books.book_id', '=', 'books.id')
            ->where([
                ['user_books.id', $userBookId],
                ['user_books.user_id', Auth::id()],
            ])
            ->select(
                'user_books.id',
                'user_books.user_id',
                'user_books.book_id',
                'books.book_cover_url',
                'books.title',
                'books.author',
                'books.description'
            )
            ->first();
        if(!isset($bookDetail)){
            abort(StatusCodeConst::UNAUTHORIZED_ERROR_NUM);
        }
        $stickyNotes = StickyRegistration::where('user_book_id', $bookDetail->id)->orderBy('page_number')->get();
        if(!isset($bookDetail)){
            abort(StatusCodeConst::NOT_FOUND_ERROR_NUM);
        }
        return view('book.detail', compact('bookDetail', 'stickyNotes'));
    }

    public function addStickyNote(StickyRequest $request){
        $userBook = UserBook::find($request->userBookId);
        //本のページを登録する。
        if($userBook->user_id != Auth::id()){
            return response()->json([
                'message' => '登録ができませんでした'
            ], StatusCodeConst::UNAUTHORIZED_ERROR_NUM);
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
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM, trans('error.server'));
        }
        return response()->json([
            'message' => '登録に成功しました'
        ], StatusCodeConst::ALL_CORRECT_NUM);
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
            ], StatusCodeConst::UNAUTHORIZED_ERROR_NUM);
        }

        $formattedMemo = BookService::newLineCodeToRegexp($request->stickyMemo);
        try {
            $stickyNote->page_number = $request->pageNumber;
            $stickyNote->sticky_title = $request->stickyTitle;
            $stickyNote->sticky_memo = $formattedMemo;
            $stickyNote->save();
        } catch (Exception $e) {
            abort(StatusCodeConst::INTERNAL_SERVER_ERROR_NUM, trans('error.server'));
        }
        return response()->json([
            'message' => '登録に成功しました'
        ], StatusCodeConst::ALL_CORRECT_NUM);

    }

    public function deleteStickyNote(Request $request){
        $userBook = UserBook::find($request->userBookId);
        if ($userBook->user_id != Auth::id()) {
            return response()->json([
                'message' => '削除ができませんでした'
            ], StatusCodeConst::UNAUTHORIZED_ERROR_NUM);
        }
        StickyRegistration::findOrFail($request->stickyId)->delete();
        return response()->json([
            'message' => '削除に成功しました。'
        ], StatusCodeConst::ALL_CORRECT_NUM);
    }


}
