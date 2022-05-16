<?php

use App\Http\Controllers\UserCreateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchBookController;
use App\Http\Controllers\BookController;
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

Route::get('/create', function () {
    return view('user.userAuthCreate');
});

Route::get('/search', function () {
    return view('book.bookSearch');
});

Route::controller(SearchBookController::class)->group(function () {
    Route::post('/book/search', 'searchBook');
});

Route::controller(BookController::class)->group(function () {
    Route::post('/book/regist', 'regist');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/book/list', 'showBooksList');
});


//Route::postの第二引数には無名関数を動かすことができる。
Route::controller(UserCreateController::class)->group(function(){
    Route::post('/user/createUser', 'createUser');
});

Route::controller(LoginController::class)->group(function(){
    Route::post('/login/auth', 'authenticate');
});

