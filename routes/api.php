<?php

use App\Http\Controllers\Api\WordApiController;
use App\Http\Controllers\Api\GameApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('games', GameApiController::class)
        ->only('store')
        ->names('api.games');;
    Route::get('words/valid', [WordApiController::class,'validate']);

});

