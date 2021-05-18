<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\playerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// player
Route::get('/signin', 'playerController@index');

Route::get('/signin', 'playerController@create');

Route::post('/signin', 'playerController@store');

Route::get('/signin', 'playerController@show');

Route::get('/signin', 'playerController@edit');

Route::post('/signin', 'playerController@update');

Route::get('/signin', 'playerController@destroy');


// tournament
Route::get('/tournament', 'tournamentController@index');

Route::post('/tournament', 'tournamentCOntroller@registerTournament');

// champion


// 

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/user/{id}', function($id){
//     return '$id';
// });
