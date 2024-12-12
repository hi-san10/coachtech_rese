<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChargeController;

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

Route::post('/favorite/{user_id?}/{shop_id}', [MypageController::class, 'favorite'])->name('favorite');

Route::get('/search', [ShopController::class, 'search'])->name('search');

Route::group(['prefix' => '/mypage'], function()
{

    Route::patch('/change/update/{id}', [ReservationController::class, 'update'])->name('update');

    Route::delete('/delete/{reservation_id}', [ReservationController::class, 'delete'])->name('delete');

    Route::get('/change/{id}/{name}/{reservation_id}', [ReservationController::class, 'change_form'])->name('change_form');

    Route::get('/qr_code/{reservation_id}', [MypageController::class, 'qr_code'])->name('qr_code');

});


Route::get('review/{reservation_id}/{shop_name}', [ReviewController::class, 'review'])->name('review');

Route::post('/review/store', [ReviewController::class, 'store']);

Route::get('review/confirm/{reservation_id}/{shop_name}', [ReviewController::class, 'confirm'])->name('review_confirm');

// Route::get('my_reservation/{id}', [ReservationController::class, 'reservation_qr'])->name('reservation_qr');

Route::post('/charge', [ChargeController::class, 'charge']);

Route::group(['prefix' => '/admin'], function()
{
    Route::get('/', [AdminController::class, 'admin']);

    Route::post('/store', [AdminController::class, 'store']);

    Route::get('/notice/mail', [AdminController::class, 'notice_mail']);

});

Route::post('/notice/send', [AdminController::class, 'notice_send']);

Route::group(['prefix' => '/restaurant_owner'], function()
{
    Route::get('/', [AdminController::class, 'restaurant_owner']);

    Route::get('/create_shop', [AdminController::class, 'create_shop_top']);

    Route::get('/edit_shop_top', [AdminController::class, 'edit_shop_top']);

    Route::get('/reservation_confirm', [AdminController::class, 'reservation_confirm']);

    Route::post('/shop_create', [AdminController::class, 'shop_create']);

    Route::patch('/shop_update', [AdminController::class, 'shop_update']);

    Route::get('/reservation_confirm', [AdminController::class, 'reservation_confirm']);

    Route::get('/passwordChange_mail', [AdminController::class, 'passwordChange_mail']);

    Route::get('/change_password/{id}', [AdminController::class, 'change_password'])->name('change_password');
});

