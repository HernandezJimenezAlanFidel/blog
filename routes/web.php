<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','InicioController@index');
Route::get('inicio','InicioController@index');
Route::get('editarcliente/{id}','AdministracionController@editcliente');
Route::get('actualizarcliente/{id}','AdministracionController@actualizarcliente');
Route::get('eliminarcliente/{id}','AdministracionController@eliminarcliente');
Route::get('eliminartarjeta/{id}','AdministracionController@eliminartarjeta');

Route::get('categorias','InicioController@categorias');
Route::get('cortecaja','InicioController@cortecaja');
Route::get('recargas','InicioController@recargas');
Route::get('base','InicioController@base');
Route::get('indexcliente','AdministracionController@indexcliente');
Route::get('indexproducto','AdministracionController@indexproducto');
Route::get('indexmembresia','AdministracionController@indexmembresia');
Route::get('indextrabajador','AdministracionController@indextrabajador');

Route::post('crearcliente','AdministracionController@crearcliente');
Route::get('registrocliente','AdministracionController@registrocliente');
Route::get('registroproducto','AdministracionController@registroproducto');
Route::get('registrotrabajador','AdministracionController@registrotrabajador');
Route::get('registromembresia','AdministracionController@registromembresia');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
