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

//----------            David               ---------------

Route::get('password', 'PasswordController@index')->name('password');
Route::patch('password', 'PasswordController@update');
//NOTE: Rotas aeronaves

Route::get('/aeronaves/{aeronave}/pilotos', 'AeronaveController@showPilotos')->name('show_apiloto');
Route::post('/aeronaves/{aeronave}/pilotos', 'AeronaveController@storePiloto')->name('store_apiloto');
Route::delete('/aeronaves/{aeronave}/pilotos', 'AeronaveController@destroyPiloto')->name('destroy_apiloto');
Route::get('/aeronaves/{aeronave}/precos_tempos', 'AeronaveController@showValores')->name('aeronaves_precos');
Route::resource('aeronaves', 'AeronaveController')->parameters(['aeronaves' => 'aeronave']);





//-----------          Marce                 --------------------
Route::get('socios/fichas', 'UserController@showFichas');
Route::get('socios/quotas', 'UserController@showQuotas');
Route::get('socios/ativar', 'UserController@showAtivarDesativar');
Route::view('socios/quotasNaoPagas', 'UserController@show')->name('socios.quotasNaoPagas');
//resolver esta rota
Route::patch('socios/{user}/quotas', 'UserController@store')->name('socios.quotas');

Route::resource('socios', 'UserController')->parameters(['socios' => 'user']);



//----------            Dinis               ---------------
Route::resource('movimentos', 'MovimentoController')->parameters(['movimentos' => 'movimento']);
Route::get('movimentos/create', 'MovimentoController@create');
Route::get('movimentos/estatisticas', 'MovimentoController@estatisticas');