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

Route::get('/create-group', function () {
    return view('user.create_group');
});

Route::get('/display-groups-characters', function () {
    return view('user.display_groups_characters');
});

Route::get('/invite-user', function () {
    return view('user.invite_user');
});

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/changepassword', 'ChangePasswordController@store')->name('change.password');
Route::post('/create-group', 'CreateGroupController@store')->name('game.property');
//Route::get('/create-group','CreateGroupController@index')->name('game.property');
Route::get('/invite-user','InviteController@index')->name('invite.property');

//Route::post('/invite-user', 'CreateGroupController@index')->name('invite.property');
//even though routing with inviting player 
//but actually heading to create group controller 
//for viewing list of game property to proceed with inviting players

//Route::post('/change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'store'])->name('change.password');
//Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');