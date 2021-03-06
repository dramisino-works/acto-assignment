<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LeaderboardController;
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

Route::get('/leaderboard', [LeaderboardController::class, 'show']);
Route::post('/games',      [GameController::class, 'store']);
