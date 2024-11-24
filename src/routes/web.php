<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

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

Route::delete('/mypage/delete/{reservation_id}', [ReservationController::class, 'delete'])->name('delete');


Route::post('/favorite/{user_id?}/{shop_id}', [MypageController::class, 'favorite'])->name('favorite');

Route::post('un_favorite/{user_id?}/{shop_id?}', [MypageController::class, 'un_favorite'])->name('un_favorite');

Route::get('/search', [ShopController::class, 'search'])->name('search');

// 不要ルート
Route::get('/d', [ShopController::class, 'd']);

Route::patch('/mypage/change/update/{id}', [ReservationController::class, 'update'])->name('update');

Route::post('/mypage/change/{id}/{name}/{reservation_id}', [ReservationController::class, 'change_form'])->name('change_form');

Route::get('review/{reservation_id}/{shop_name}', [ReviewController::class, 'review'])->name('review');

Route::post('/review/store', [ReviewController::class, 'store']);

Route::get('review/confirm/{reservation_id}/{shop_name}', [ReviewController::class, 'confirm'])->name('review_confirm');

Route::get('my_reservation/{id}', [ReservationController::class, 'reservation_qr'])->name('reservation_qr');

Route::post('/charge', [ChargeController::class, 'charge']);

Route::get('/admin', [AdminController::class, 'admin']);

Route::post('/admin/store', [AdminController::class, 'store']);

Route::get('/admin/notice/mail', [AdminController::class, 'notice_mail']);

Route::post('/notice/send', [AdminController::class, 'notice_send']);

Route::group(['prefix' => '/restaurant_owner'], function()
{
    Route::get('/', [AdminController::class, 'restaurant_owner']);

    Route::get('/create_shop', [AdminController::class, 'create_shop_top']);

    Route::get('/edit_shop_top', [AdminController::class, 'edit_shop_top']);

    Route::get('/reservation_confirm', [AdminController::class, 'reservation_confirm']);

    Route::post('/shop_create', [AdminController::class, 'shop_create']);

    Route::post('/shop_update', [AdminController::class, 'shop_update']);

    Route::get('/reservation_confirm', [AdminController::class, 'reservation_confirm']);
});

Route::get('/mypage/qr_code', [MypageController::class, 'qr_code'])->name('qr_code');

Route::get('/admin_login', [LoginController::class, 'admin_login']);

Route::get('/restaurant_owner_login', [LoginController::class, 'restaurant_owner_login']);

Route::post('/admin_login/login', [LoginController::class, 'admin_login_login']);

Route::post('/restaurant_owner_login/login', [LoginController::class, 'restaurant_owner_login_login']);