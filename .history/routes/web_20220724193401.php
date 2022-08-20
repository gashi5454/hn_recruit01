<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\AppliesController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\EventerDashboardController;
use App\Http\Controllers\EventerLoginController;
use App\Http\Controllers\EventerRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventerController;

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


Route::get('/register-li', RegisterLi::class)->name('register-li');

//トップ兼検索画面
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

//プロフィール
//Route::middleware(['auth:sanctum', 'verified'])->get('/user/profile', [LoginController::class, 'index'])->name('profile.show');

//検索結果
Route::post('/search', [OffersController::class, 'search'])->name('search');
Route::get('/search', [OffersController::class, 'search'])->name('search');

//求人詳細
Route::post('/detail/{id}/', [OffersController::class, 'detail'])->name('detail');
Route::get('/detail/{id}/', [OffersController::class, 'detail'])->name('detail');

//応募ページ
Route::post('/applies', [AppliesController::class, 'index'])->name('applies');
Route::get('/applies', [AppliesController::class, 'index'])->name('applies');

//送信前確認ページ
Route::post('/confirm_applies', [AppliesController::class, 'confirm_applies'])->name('confirm_applies');
Route::get('/confirm_applies', [AppliesController::class, 'confirm_applies'])->name('confirm_applies');

//応募メール送信
//Route::post('/send_completed/{offers}', [MailSendController::class, 'send_applies_forUser'])->name('send_completed');
Route::get('/send_completed/{offers}', [MailSendController::class, 'send_applies_forUser'])->name('send_completed');
Route::post('/send_applies', [AppliesController::class, 'store'])->name('send_applies');
Route::get('/send_applies', [AppliesController::class, 'store'])->name('send_applies');

/*
//ライブハウス側ルーティング
Route::prefix('eventer')->group(function () {
    Route::get('login', [EventerLoginController::class, 'create'])->name('eventer.login');
    Route::post('login', [EventerLoginController::class, 'store']);

    Route::get('register', [EventerRegisterController::class, 'create'])->name('eventer.register');
    Route::post('register', [EventerRegisterController::class, 'store']);

    Route::middleware('auth:eventer')->group(function () {
        Route::get('dashboard', [EventerDashboardController::class, 'index'])->name('eventer.dashboard');;
    });
});
*/
