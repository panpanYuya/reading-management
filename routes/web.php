<?php

use App\Http\Controllers\Book\BookDetailController;
use App\Http\Controllers\Book\SearchBookController;
use App\Http\Controllers\Book\BookListController;
use App\Http\Controllers\Book\EditBookController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' =>['guest']], function(){
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login/auth', 'authenticate');
});

Route::get('/user/create', function () {
    return view('user.auth.create');
});

Route::get('/password/forget', function(){
    return view('password.entry-mail');
});


Route::controller(PasswordController::class)->group(function () {
    Route::post('/password/send', 'sendPasswordEmail');
    Route::get('/password/edit', 'editPassword');
    Route::post('/password/update', 'updatePassword');
});
//Route::postの第二引数には無名関数を動かすことができる。
Route::controller(CreateUserController::class)->group(function () {
    Route::post('/user/createUser', 'createUser');
    Route::get('/user/regist', 'authEmail');
});

Route::controller(EditUserController::class)->group(function () {
    Route::get('/user/update/email', 'updateAuthEmail');
});

Route::middleware('auth')->group(function () {

    Route::controller(BookDetailController::class)->group(function () {
        Route::get('/book/detail/{userBookId}', 'showDetail');
        Route::post('/book/sticky/add', 'addStickyNote');
        Route::post('/book/sticky/update', 'updateStickyNote');
        Route::post('/book/sticky/delete', 'deleteStickyNote');
    });

    Route::controller(BookListController::class)->group(function () {
        Route::get('/book/list/{statusId}', 'showBooksList')->name('list');
    });

    Route::controller(EditBookController::class)->group(function (){
        Route::get('/book/detail/{userBookId}/edit', 'showEditBook');
        Route::post('/book/detail/{userBookId}/edit/status/update', 'changeStatus');
        Route::post('/book/detail/{userBookId}/delete', 'deleteBook');
    });

    Route::controller(SearchBookController::class)->group(function () {
        Route::post('/book/search', 'searchBooks');
        Route::post('/book/regist', 'registBook');
    });

    Route::controller(EditUserController::class)->group(function () {
        Route::get('/user/edit', 'edit');
        Route::post('/user/update', 'update');
    });

    Route::controller(DeleteUserController::class)->group(function () {
        Route::get('/user/cancell', 'cancell');
        Route::post('/user/delete', 'delete');
    });

    Route::get('/book/search', function () {
        return view('book.search');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/logout', 'logout');
    });
});




