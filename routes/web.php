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
})->middleware('auth.characterCreation');

Route::get('/character_created/{gameId}', function ($gameId) {
    return view('knights.character_created', ['gameId' => $gameId]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::post('/group-management/invite', [App\Http\Controllers\InviteController::class, 'updateSingle'])->name('invite.updateSingle');
Route::get('/group-management/{game_id}/invite-single-user', function ($game_id){
    return view('knights.invite_single_user', ['gameId' => $game_id]);
});

Route::post('/group-management/remove', [App\Http\Controllers\InviteController::class, 'removeSingle'])->name('invite.removeSingle');
Route::get('/group-management/{game_id}/remove-single-user', function ($game_id){
    return view('knights.remove_single_user', ['gameId' => $game_id]);
});

Route::post('/group-management/delete', [App\Http\Controllers\InviteController::class, 'deleteGroup'])->name('invite.deleteGroup');
Route::get('/group-management/delete-group/{game_id}', function ($game_id){
    return view('knights.delete_group', ['gameId' => $game_id]);
});

Route::post('/changepassword', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('password.improve');

Route::get('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('password.change');

Route::get('/changePasswordSuccessfully', function(){
    return view('auth.changePasswordSuccessfully');
});

Route::get('/access-denied', function () {
    return view('access_denied');
});



Route::get('/director-management', function () {
    return view('directors.director_management');
})->middleware('auth.gameDirector');

Route::get('/director-management/{game_id}', function ($game_id) {
    return view('directors.display_group', ['gameId' => $game_id]);
})->middleware('auth.gameDirector');

Route::get('/director-management/{game_id}/{week_no}', function ($game_id, $week_no) {
    return view('directors.display_week', ['gameId' => $game_id], ['weekNo' => $week_no]);
})->middleware('auth.gameDirector');

Route::get('/director-management/{game_id}/{week_no}/{action_id}', function ($game_id, $week_no, $action_id) {
    return view('directors.display_user_actions', ['gameId' => $game_id], ['weekNo' => $week_no], ['actionId' => $action_id]);
})->middleware('auth.gameDirector');