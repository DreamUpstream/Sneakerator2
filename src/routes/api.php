<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Api\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/sneakers')->name('sneakers.')->group(function() {
    Route::get('/', [Controllers\Api\SneakerController::class, 'getSneakers'])->middleware('auth:sanctum');
    Route::post('/', [Controllers\Api\SneakerController::class, 'storeSneaker'])->middleware('auth:sanctum');
    Route::delete('/', [Controllers\Api\SneakerController::class, 'deleteSneaker'])->middleware('auth:sanctum');
    Route::get('/login', LoginController::class);
    Route::post('/tokens', [Controllers\Api\SneakerController::class, 'addTokens']);
    Route::get('/tokens', [Controllers\Api\SneakerController::class, 'getTokens']);
});
