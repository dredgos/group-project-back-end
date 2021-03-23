<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\ReviewController;


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

Route::group(["prefix" => "/games"], function() {
    Route::get("/recommendations", [GameController::class, "recommendations"]);
    Route::get("", [GameController::class, "index"]);
    Route::get('/{game}', [GameController::class, "show"]);
    Route::post('/{game}/reviews', [ReviewController::class, "store"]);
    Route::get('/{game}/reviews', [ReviewController::class, "index"]);
});
