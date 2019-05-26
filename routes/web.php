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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('ativo');



//----------            Dinis               ---------------

Route::get('movimentos', 'MovimentosController@index')->name('movimentos.index');
Route::get('movimentos/{movimento}/edit','MovimentosController@edit')->name('movimentos.edit');
Route::get('movimentos/create','MovimentosController@create')->name('movimentos.create');
Route::post('movimentos', 'MovimentosController@store')->name('movimentos.store');
Route::put('movimentos/{movimento}', 'MovimentosController@update')->name('movimentos.update');
Route::get('movimentos/estatisticas','MovimentosController@estatistica')->name('movimentos.estatistica');






//----------            David               ---------------

Route::get('password', 'PasswordController@index')->name('password');
Route::patch('password', 'PasswordController@update');
//NOTE: Rotas aeronaves
Route::get('/aeronaves/{aeronave}/precos_tempos', 'AeronaveController@showValores')->name('aeronaves_precos');
Route::resource('aeronaves', 'AeronaveController')->parameters(['aeronaves' => 'aeronave']);



//NOTE: Rotas socios
Route::get('socios/fichas', 'UserController@showFichas');
Route::get('socios/quotas', 'UserController@showQuotas');
Route::get('socios/ativar', 'UserController@showAtivarDesativar');
Route::resource('socios', 'UserController')->parameters(['users' => 'user']);
