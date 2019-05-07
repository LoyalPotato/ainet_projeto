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

Route::get('/password', 'PasswordController@index')->name('password');
Route::patch('/password', 'PasswordController@update');

//NOTE: Rotas aeronaves
Route::resource('aeronaves', 'AeronaveController')->parameters(['aeronaves' => 'aeronave']);