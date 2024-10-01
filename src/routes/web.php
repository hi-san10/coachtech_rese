<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReservationController;

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
Route::group(['middleware' => 'auth'], function()
{

    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');

    Route::get('detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');

});

Route::get('/', [ShopController::class, 'index'])->name('shop_all');


Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [LoginController::class, 'register']);

Route::post('/register/store', [LoginController::class, 'store']);

Route::get('verify/{token}', [LoginController::class, 'verify'])->name('verify');

Route::post('/login/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/reservation/{user_id?}/{shop_id}', [ReservationController::class, 'reservation'])->name('reservation');

Route::delete('/mypage/delete/{reserv_id}', [ReservationController::class, 'delete'])->name('delete');


Route::post('/favorite/{user_id?}/{shop_id}', [MypageController::class, 'favorite'])->name('favorite');

Route::post('un_favorite/{user_id?}/{shop_id?}', [MypageController::class, 'un_favorite'])->name('un_favorite');

Route::get('/search', [ShopController::class, 'search'])->name('search');

Route::get('/d', [ShopController::class, 'd']);

Route::patch('/mypage/change/update/{id}', [ReservationController::class, 'update'])->name('update');

Route::post('/mypage/change/{id}/{name}/{reserv_id}', [ReservationController::class, 'changeform'])->name('changeform');