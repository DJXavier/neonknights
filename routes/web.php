<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\Auth\ChangePasswordController;


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

Route::get('/manual', function () {
    return view('homepage.gameManual');
});

Route::get('/changepassword', function () {
    return view('Auth.changePassword'); 
});

Route::get('/changePasswordSuccessfully', function(){
    return view('Auth.changePasswordSuccessfully');
});

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/changepassword', 'ChangePasswordController@store')->name('change.password');
//Route::post('/change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'store'])->name('change.password');
//Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');