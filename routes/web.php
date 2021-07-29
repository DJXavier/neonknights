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

Route::get('/character/create/{gameId}', function ($gameId) {
    return view('knights.character', ['id' => $gameId]);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/knight', [App\Http\Controllers\KnightController::class, 'store'])->name('knight.store');

Route::get('/display-groups-characters', function () {
    return view('user.display_groups_characters');
});

Route::get('/create-group', function () {
    return view('user.create_group');
});

Route::get('/invite/create', function () {
    return view('user.invite_user');
})->name('invite.create');

Route::get('/invite-successful', function () {
    return view('user.invite_successful');
});

Route::post('/game', [App\Http\Controllers\GameController::class, 'store'])->name('game.store');
Route::post('/invite/{game_id}',[App\Http\Controllers\InviteController::class, 'update'])->name('invite.update');

Route::post('/changepassword', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('change.password');

Route::get('/changepassword', function () {
    return view('auth.changePassword'); 
});

Route::get('/changePasswordSuccessfully', function(){
    return view('auth.changePasswordSuccessfully');
});