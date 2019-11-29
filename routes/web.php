<?php

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

Route::get('/', function () {
    return redirect()->action('PokemonController@index');
});


// Route::get('/', 'PokemonController@index');


Auth::routes(['verify'=>true]);

// Route::get('/home', 'HomeController@index')->name('home');


Route::resource('pokemon', 'PokemonController');

Route::resource('ability', 'AbilityController');

// Route::resource('abilitypokemon', 'AbilityPokemonController');
// Route::resource('comments', 'CommentsController');
Route::resource('post', 'PostController');

Route::post('comments', 'CommentsController@store');

Route::post('borrarComment', 'CommentsController@destroy');

Route::post('abilitypokemon', 'AbilityPokemonController@store');

Route::post('borrar', 'AbilityPokemonController@destroy');

Route::resource('user', 'UserController');


// Route::any('subir','IndexController@subirArchivo');