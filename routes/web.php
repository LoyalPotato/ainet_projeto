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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('movimentos', 'MovimentosController@index')->name('movimentos.index');

Route::get('movimentos/{movimento}/edit','MovimentosController@edit')->name('movimentos.edit');



Route::get('movimentos/create','MovimentosController@create')->name('movimentos.create');


Route::post('movimentos', 'MovimentosController@store')->name('movimentos.store');


Route::put('movimentos/{movimento}', 'MovimentosController@update')->name('movimentos.update');



Route::get('movimentos/estatisticas','MovimentosController@estatistica')->name('movimentos.estatistica');





//---------------Copiado----------------- 

Route::get('/password', 'PasswordController@index')->name('password');
Route::patch('/password', 'PasswordController@update');
//NOTE: Rotas aeronaves
Route::resource('aeronaves', 'AeronaveController')->parameters(['aeronaves' => 'aeronave']);