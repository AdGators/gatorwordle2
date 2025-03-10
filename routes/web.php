<?php

use App\Http\Controllers\GameHistoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session')])
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('wordle');
        Route::resource('games', GameHistoryController::class)->only('index');
    });
