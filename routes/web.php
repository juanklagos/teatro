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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('usuario/create','UsuariosController@create');
Route::post('usuarios/{id}/update','UsuariosController@update');
Route::resource('usuarios','UsuariosController');
Route::get('reserva/create/{id}','ReservasController@create');
Route::resource('reservas','ReservasController');
