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

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');



//----------            Dinis               ---------------

Route::get('movimentos', 'MovimentosController@index')->name('movimentos.index');
Route::get('movimentos/{movimento}/edit','MovimentosController@edit')->name('movimentos.edit');
Route::get('movimentos/create','MovimentosController@create')->name('movimentos.create');
Route::post('movimentos/{movimento}/confirmar','MovimentosController@confirmar')->name('movimentos.confirmar');

Route::post('movimentos', 'MovimentosController@store')->name('movimentos.store');
Route::put('movimentos/{movimento}', 'MovimentosController@update')->name('movimentos.update');
Route::get('movimentos/estatisticas','MovimentosController@estatistica')->name('movimentos.estatistica');
Route::delete('movimentos/{movimento}','MovimentosController@destroy')->name('movimentos.destroy');



//------            David               ----------
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

Route::resource('aerodromos', 'AerodromosController')->parameters(['aerodromos' => 'aerodromo']);
// Route::get('/aerodromos', 'AerodromosController@index')->name('aerodromos_list');
// Route::get('/aerodromos/{aerodomo}/edit', 'AerodromosController@edit')->name('aerodromos_edit');
// Route::put('/aerodromos/{aerodomo}', 'AerodromosController@update')->name('aerodromos_update');

//-----------          Marce                 --------------------

Route::patch('/socios/{socio}/quotas', 'UserController@ativarDesativarQuota')->name('ativarDesativarQuota');
Route::patch('/socios/{socio}/ativo', 'UserController@ativarDesativarSocio')->name('ativarDesativarSocio');
Route::patch('/socios/reset_quotas', 'UserController@resetQuotas')->name('socios.quotas');
Route::patch('/socios/desativar_sem_quotas', 'UserController@deactivateSocios')->name('socios.ativar');

Route::post('/socios/{socio}/send_reactivate_mail', 'UserController@create');

Route::get('/socios/fichas', 'UserController@showFichas')->name('socios.fichas');
Route::get('/socios/fichas_direcao', 'UserController@showFichasDirecao');
Route::get('/socios/quotas', 'UserController@showQuotas');
Route::get('/socios/ativar', 'UserController@showAtivarDesativar');

Route::resource('socios', 'UserController')->parameters(['socios' => 'user']);



