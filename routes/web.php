<?php

use App\Http\Controllers\UserCreateController;
use App\Http\Controllers\LoginController;
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
    return view('/user/userAuthCreate');
});

Route::get('/', function () {
    return view('/login');
});


//Route::postの第二引数には無名関数を動かすことができる。
Route::controller(UserCreateController::class)->group(function(){
    Route::post('/user/createUser', 'createUser');
});

Route::controller(LoginController::class)->group(function(){
    Route::post('/login', 'authenticate');
});

