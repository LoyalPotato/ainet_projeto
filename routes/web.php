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

Auth::routes(['verify' => true]);

// NOTE: Inves de middleware de ativo, poderia ter usado o verified?
Route::get('/home', 'HomeController@index')->name('home')->middleware('ativo');

//----------            David               ---------------

Route::get('password', 'PasswordController@index')->name('password');
Route::patch('password', 'PasswordController@update');
//NOTE: Rotas aeronaves

Route::get('/aeronaves/{aeronave}/pilotos', 'AeronaveController@showPilotos')->name('show_apiloto');
Route::post('/aeronaves/{aeronave}/pilotos/{piloto}', 'AeronaveController@storePiloto')->name('store_apiloto');
Route::delete('/aeronaves/{aeronave}/pilotos/{piloto}', 'AeronaveController@destroyPiloto')->name('destroy_apiloto');
Route::get('/aeronaves/{aeronave}/precos_tempos', 'AeronaveController@showValores')->name('aeronaves_precos');
Route::resource('aeronaves', 'AeronaveController')->parameters(['aeronaves' => 'aeronave']);




Route::get('/pilotos/{piloto}/certificado', 'UserController@showCertificado')->name('piloto_cert');
Route::get('/pilotos/{piloto}/licenca', 'UserController@showLicenca')->name('piloto_lic');
//-----------          Marce                 --------------------

Route::patch('/socios/{user}/quota', 'UserController@ativarDesativarQuota');
Route::patch('/socios/reset_quotas', 'UserController@resetQuotas')->name('socios.quotas');
Route::patch('/socios/desativar_sem_quotas', 'UserController@deactivateSocios')->name('socios.ativar');
Route::patch('/socios/{user}/ativo', 'UserController@showQuotas');

Route::post('/socios/{socio}/send_reactivate_mail', 'UserController@create');
Route::put('/socios/{user}/edit', 'UserController@update');

Route::get('/socios/fichas', 'UserController@showFichas');
Route::get('/socios/fichas_direcao', 'UserController@showFichasDirecao');
Route::get('/socios/quotas', 'UserController@showQuotas');
Route::get('/socios/ativar', 'UserController@showAtivarDesativar');

Route::resource('socios', 'UserController')->parameters(['socios' => 'user']);



//----------            Dinis               ---------------
Route::resource('movimentos', 'MovimentoController')->parameters(['movimentos' => 'movimento']);
Route::get('movimentos/create', 'MovimentoController@create');
Route::get('movimentos/estatisticas', 'MovimentoController@estatisticas');