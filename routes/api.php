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

Route::resource('/filmes', 'FilmesController');
Route::resource('/atores', 'AtoresController');
Route::resource('/diretor', 'DiretorController');
Route::resource('/filmes-atores', 'FilmesAtoresController');
Route::resource('/filmes-diretor', 'FilmesDiretorController');

Route::get('/filmes-atores-diretor', 'FilmesController@filmeAtorDiretor');

