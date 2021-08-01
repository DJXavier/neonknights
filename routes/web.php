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

Route::get('/display-groups-characters', function () {
    return view('knights.display_groups_characters');
});

Route::get('/create-group', function () {
    return view('knights.create_group');
});

Route::get('/policy', function () {
    return view('homepage.privacy_policy');
});

Route::get('/handbook', function () {
    return view('homepage.handbook');
});

Route::get('/insert-weekly-actions', function () {
    return view('knights.insert_weekly_actions');
});

Route::get('/group-management/{game_id}', function ($game_id) {
    return view('knights.group_management', ['gameId' => $game_id]);
})->middleware('auth.gameMaster');
Route::get('/character/create/{gameId}', function ($gameId) {
    return view('knights.character', ['id' => $gameId]);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/group-management/update-group-size', [App\Http\Controllers\GameController::class, 'updateSize'])->name('game.update');
    
Route::get('/group-management/{game_id}/update-size', function ($game_id){
    return view('knights.update_size', ['gameId' => $game_id]);
});

Route::post('/knight', [App\Http\Controllers\KnightController::class, 'store'])->name('knight.store');

Route::get('/display-groups-characters', function () {
    return view('knights.display_groups_characters');
});

Route::get('/create-group', function () {
    return view('knights.create_group');
});

Route::get('/invite/create', function () {
    return view('knights.invite_user');
})->name('invite.create');

Route::get('/invite-successful', function () {
    return view('knights.invite_successful');
});

Route::post('/game', [App\Http\Controllers\GameController::class, 'store'])->name('game.store');
Route::post('/invite/{game_id}',[App\Http\Controllers\InviteController::class, 'update'])->name('invite.update');

Route::post('group-management/invite', [App\Http\Controllers\InviteController::class, 'updateSingle'])->name('invite.updateSingle');
Route::get('/group-management/{game_id}/invite-single-user', function ($game_id){
    return view('knights.invite_single_user', ['gameId' => $game_id]);
});

Route::post('/changepassword', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('password.improve');

Route::get('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('password.change');

Route::get('/changePasswordSuccessfully', function(){
    return view('auth.changePasswordSuccessfully');
});