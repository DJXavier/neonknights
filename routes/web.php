<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;

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

//Route::get('/home', [SignInController::class, 'homePage']);
Route::get('/', function () {
    return view('homepage.homePage');
});

Route::get('/policy', function () {
    return view('homepage.privacy_policy');
});

Route::get('/handbook', function () {
    return view('homepage.handbook');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
