<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\tournamentController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')
    ->middleware(['auth:sanctum','verified'])
    ->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');
        Route::resource('users', UserController::class);        
        Route::resource('tournaments', tournamentController::class);
        Route::resource('players', PlayerController::class);
        Route::resource('regions', RegionController::class);
        Route::resource('games', GameController::class);

        // Route::get('transaksi/{id}/status/{status}',[TransaksiController::class,'changeStatus'])->name('transaksi.changeStatus');
        // Route::resource('transaksi', TransaksiController::class);        
    });

    Route::get('/', [tournamentController::class,'katalog']);