<?php

use App\Http\Controllers\AbandoLandController;
use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [AccountController::class, 'auth']);

/**
 * ログイン画面
 */
Route::get('/login', [AccountController::class, 'auth']);

Route::get('mypage', function () {
    return view('account.mypage');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/land/{land_id}', [AbandoLandController::class, 'viewByLandId']);

Route::get('/charge', function () {
    return view('charge');
});

Route::get('/contract', function () {
    return view('contract');
});

Route::get('/owner/{user_id}', function ($id) {
    return view('owner.index');
});