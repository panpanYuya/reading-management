<?php

use App\Http\Controllers\UserCreateController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SearchBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Book\DetailController;
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

Route::get('/', function () {
    return view('login');
})->name('login');


Route::controller(LoginController::class)->group(function () {
    Route::post('/login/auth', 'authenticate');
});

Route::get('/user/create', function () {
    return view('user.userAuthCreate');
});

Route::get('/password/forget', function(){
    return view('password.entryMail');
});


Route::controller(PasswordController::class)->group(function () {
    Route::post('/password/send', 'sendPasswordEmail');
    Route::get('/password/edit', 'editPassword');
    Route::post('/password/update', 'updatePassword');
});
//Route::postの第二引数には無名関数を動かすことができる。
Route::controller(UserCreateController::class)->group(function () {
    Route::post('/user/createUser', 'createUser');
    Route::get('/user/regist', 'authEmail');
});

Route::middleware('auth')->group(function () {

    Route::controller(BookController::class)->group(function () {
        Route::post('/book/regist', 'regist');
        Route::get('/book/list/', 'showBooksList')->name('list');
    });

    Route::controller(DetailController::class)->group(function () {
        Route::get('/book/detail/{apiId}', 'showDetail');
        Route::post('/book/sticky/add', 'addStickyNote');
        Route::post('/book/sticky/update', 'updateStickyNote');
        Route::post('/book/sticky/delete', 'deleteStickyNote');
    });

    Route::controller(UserEditController::class)->group(function () {
        Route::get('/user/edit', 'edit');
        Route::post('/user/update', 'update');
        Route::get('/user/update/email', 'updateAuthEmail');
    });

    Route::get('/book/search', function () {
        return view('book.bookSearch');
    });

    Route::controller(SearchBookController::class)->group(function () {
        Route::post('/book/search', 'searchBook');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/logout', 'logout');
    });
});




