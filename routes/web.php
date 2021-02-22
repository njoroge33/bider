<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\Auth\ConfirmationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */

Route::get('/account/activation', [ConfirmationController::class, 'index']) ;
Route::post('/account/activation', [ConfirmationController::class, 'store']);

Route::get('/bids', [BidController::class, 'index'])->name('bids')->middleware('auth');
Route::post('/bids', [BidController::class, 'store']);

Route::get('/bidding', [BiddingController::class, 'index'])->name('bidding');
Route::post('/bidding', [BiddingController::class, 'store']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store']);
// Route::post('/', [HomeController::class, 'store']); 

Route::get('/upload', [UploadController::class, 'index'])->name('upload');
Route::post('/upload', [UploadController::class, 'store']); 

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Auth::routes();
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']); 

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/menu-main', function () {
    return view('layouts/menu-main');
})->name('menu-main');

Route::get('/deposit', function () {
    return view('deposit');
})->name('deposit');

Route::get('/aboutus', function () {
    return view('more/about');
})->name('about');


Route::get('/how', function () {
    return view('more/how');
})->name('how');

