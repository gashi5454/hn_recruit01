<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\AppliesController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\UploadController;
//use App\Http\Controllers\redirectbackController;

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

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

//ログイン後、現在のページへリダイレクト
//Route::post('/redirectback', [redirectbackController::class, 'index'])->name('redirectback');
//Route::get('/redirectback', [redirectbackController::class, 'index'])->name('redirectback');

//トップ兼検索画面
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

//プロフィール
Route::middleware(['auth:sanctum', 'verified'])->get('/user/profile', [LoginController::class, 'index'])->name('profile');

//検索結果
Route::post('/search', [OffersController::class, 'search'])->name('search');
Route::get('/search', [OffersController::class, 'search'])->name('search');

//求人詳細
Route::post('/detail/{id}/', [OffersController::class, 'detail'])->name('detail');
Route::get('/detail/{id}/', [OffersController::class, 'detail'])->name('detail');

//求人への応募
//Route::get('/applies/{id}/', [AppliesController::class, 'index'])->name('applies');
Route::get('/applies', [AppliesController::class, 'index'])->name('applies');

//応募メール送信
//Route::get('/mail', [MailSendController::class,'index']);
//Route::post('/mail', [MailSendController::class,'send']);
Route::get('/mail_offers', [MailSendController::class, 'mail_offers'])->name('mail_offers');
Route::get('/send_completed', [MailSendController::class, 'send_completed'])->name('send_completed');

//音源アップロード
Route::resource('uploadBandsAudio', [UploadController::class, 'uploadBandsAudio']);
