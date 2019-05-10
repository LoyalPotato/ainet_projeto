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
Route::resource('aeronaves', 'AeronaveController')->parameters(['aeronaves' => 'aeronave']);



//NOTE: Rotas socios
Route::resource('users', 'UserController')->parameters(['users' => 'user']);

Route::get('/socios', 'UserController@index')->name('users.index');
Route::get('/socios/{socio}/edit', 'UserController@edit')->name('users.create');
Route::get('/socios/create', 'UserController@create')->name('users.store');

Route::post('/socios', 'UserController@index')->name('users.edit');
Route::put('/socios/{socio}', 'UserController@update')->name('users.update');
Route::delete('/socios/{socio}', 'UserController@destroy')->name('users.destroy');

Route::patch('/socios/{socio}/quota', 'UserController@index')->name('users.index');
Route::patch('/socios/reset_quotas', 'UserController@index')->name('users.index');
Route::patch('/socios/{socio}/ativo', 'UserController@index')->name('users.index');
Route::patch('/socios/desativar_sem_quotas', 'UserController@index')->name('users.index');

Route::post('/socios/{socio}/send_reactivate_mail', 'UserController@index')->name('users.index');
Route::get('/pilotos/{piloto}/certificado', 'UserController@index')->name('users.index');
Route::get('/pilotos/{piloto}/licenca', 'UserController@index')->name('users.index');