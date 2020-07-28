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
Route::get('indexcliente','AdministracionController@indexcliente');
Route::post('crearcliente','AdministracionController@crearcliente');
Route::get('registrocliente','AdministracionController@registrocliente');

Route::post('registrarcompra','AdministracionController@registrarcompra');//->hecho por osmar cualquier problema se borra

Route::get('editarcliente/{id}','AdministracionController@editcliente');
Route::get('actualizarcliente/{id}','AdministracionController@actualizarcliente');
Route::get('eliminarcliente/{id}','AdministracionController@eliminarcliente');

Route::get('eliminartarjeta/{id}','AdministracionController@eliminartarjeta');
Route::get('eliminarventa/{id}','AdministracionController@eliminarventa');

Route::get('categorias','InicioController@categorias');
Route::get('cortecaja','InicioController@cortecaja');
Route::get('recargas','InicioController@recargas');
Route::get('base','InicioController@base');

Route::get('indexmembresia','AdministracionController@indexmembresia');

//trabajador
Route::get('indextrabajador','AdministracionController@indextrabajador');
Route::get('registrotrabajador','AdministracionController@registrotrabajador');
Route::post('creartrabajador','AdministracionController@creartrabajador');
Route::get('editartrabajador/{id}','AdministracionController@edittrabajador');
Route::get('actualizartrabajador/{id}','AdministracionController@actualizartrabajador');
Route::get('eliminarempleado/{id}','AdministracionController@eliminarempleado');
//cliente
Route::get('indexproducto','AdministracionController@indexproducto');
Route::get('ventas','AdministracionController@ventas');
Route::post('crearproducto','AdministracionController@crearproducto');
Route::get('registroproducto','AdministracionController@registroproducto');
Route::get('editarproducto/{id}','AdministracionController@editproducto');
Route::post('actualizarproducto/{id}','AdministracionController@actualizarproducto');
Route::get('eliminarproducto/{id}','AdministracionController@eliminarproducto');


Route::get('registrotrabajador','AdministracionController@registrotrabajador');
Route::get('registromembresia','AdministracionController@registromembresia');

Route::get('crearreporte','AdministracionController@corte');
//Route::get('impresion','AdministracionController@impresion');

Auth::routes();
//Route::get('impresion','AdministracionController@impresion');
Route::get('impresionTicket','AdministracionController@impresionTicket');
Route::get('impresionResponsiva','AdministracionController@impresionResponsiva');
Route::get('/home', 'HomeController@index')->name('home');
