<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MypageController;

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

Route::get('/', [ShopController::class, 'index'])->name('shop_all');

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [LoginController::class, 'register']);

Route::post('/register/store', [LoginController::class, 'store']);

Route::get('verify/{email}/{token}', [LoginController::class, 'verify'])->name('verify');

Route::post('/login/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');

Route::post('/reservation/{user_id?}/{shop_id}', [MypageController::class, 'reservation'])->name('reservation');

Route::get('/mypage/{user_id?}', [MypageController::class, 'index'])->name('mypage');

Route::delete('/mypage/delete/{reserv_id}', [MypageController::class, 'delete'])->name('delete');

Route::get('/search', [ShopController::class, 'search']);