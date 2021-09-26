<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/game/joust/{gameId}/{knightId}', [App\Http\Controllers\GameController::class, 'getJoustingOpponents'])
    ->withoutMiddleware('auth');

Route::get('/noblebot/{gameId}', [App\Http\Controllers\NoblebotController::class, 'getBots']);