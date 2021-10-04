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

Route::get('/weeklyactiontemp', function () {
    return view('weeklyaction.create');
});

Route::middleware(['verified'])->group(function () {
    Route::get('/group-management/{game_id}', [App\Http\Controllers\InviteController::class, 'viewManage'])->middleware('auth.gameMaster'); 

    Route::post('/group-management/invite', [App\Http\Controllers\InviteController::class, 'updateSingle'])->name('invite.updateSingle');
    Route::get('/group-management/{game_id}/invite-single-user', function ($game_id){
        return view('user.invite_single_user', ['gameId' => $game_id]);
    });

    Route::post('/group-management/remove', [App\Http\Controllers\InviteController::class, 'removeSingle'])->name('invite.removeSingle');
    Route::get('/group-management/{game_id}/remove-single-user', function ($game_id){
        return view('user.remove_single_user', ['gameId' => $game_id]);
    });

    Route::post('/group-management/delete', [App\Http\Controllers\InviteController::class, 'deleteGroup'])->name('invite.deleteGroup');
    Route::get('/group-management/delete-group/{game_id}', function ($game_id){
        return view('user.delete_group', ['gameId' => $game_id]);
    });

    Route::post('/group-management/start', [App\Http\Controllers\InviteController::class, 'startGame'])->name('invite.start');


    Route::get('/character/create/{gameId}', function ($gameId) {
        return view('knights.character', ['id' => $gameId]);
    })->middleware('auth.characterCreation')->name('knight.create');

    Route::get('/character_created/{gameId}', function ($gameId) {
        return view('knights.character_created', ['gameId' => $gameId]);
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/knight', [App\Http\Controllers\KnightController::class, 'store'])->name('knight.store');

    Route::get('/display-groups-characters', function () {
        return view('user.display_groups_characters');
    })->name('display.account');

    Route::get('/create-group', function () {
        return view('user.create_group');
    });
    
    Route::get('/invite/create/{gameId}', function ($gameId) {
        return view('user.invite_user', ['gameId' => $gameId]);
    })->name('invite.create');
    
    Route::get('/invite-successful/{gameId}', function ($gameId) {
        return view('user.invite_successful', ['gameId' => $gameId]);
    });
    
    Route::get('/weeklyaction/{gameId}', function ($gameId) {
        return view('weeklyaction.create', ['id' => $gameId]);
    })->name('weeklyaction.newWeek');

    Route::get('/submittedweeklyaction', function () {
        return view('weeklyaction.submitted');
    });

    Route::post('/submittedweeklyaction/{gameId}', [App\Http\Controllers\WeeklyActionController::class, 'update'])->name('weeklyaction.update');
    
    Route::post('/game', [App\Http\Controllers\GameController::class, 'store'])->name('game.store');
    Route::post('/invite/{game_id}',[App\Http\Controllers\InviteController::class, 'update'])->name('invite.update');
    
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
        return view('directors.display_week', ['gameId' => $game_id, 'weekNo' => $week_no]);
    })->middleware('auth.gameDirector');
    
    Route::get('/director-management/{game_id}/{week_no}/{knight_id}', function ($game_id, $week_no, $knight_id) {
        return view('directors.display_user_actions', ['gameId' => $game_id, 'weekNo' => $week_no, 'knightId' => $knight_id]);
    })->middleware('auth.gameDirector');

    Route::get('/game/advance', [App\Http\Controllers\GameController::class, 'advance'])
        ->middleware('auth.gameDirector');
});

Auth::routes(["verify" => true]);
