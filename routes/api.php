<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/holamundo', function()
{
    return 'Hola Mundo.';
});
Route::get('/indexproducto','AdministracionApi@indexproducto');
Route::get('/registrarcompra','AdministracionApi@registrarcompra');//->hecho por osmar cualquier problema se borra
Route::get('/crearreporte','AdministracionApi@corte');
Route::get('/ventas','AdministracionApi@ventas');
Route::get('/indexmembresia','AdministracionApi@indexmembresia');
Route::get('/actualizarmembresia','AdministracionApi@actualizarmembresia');
Route::get('/eliminartarjeta','AdministracionApi@eliminartarjeta');
Route::get('/crearreporte','AdministracionApi@corte');
Route::get('/login','AdministracionApi@autenticar');
Route::get('/verificartarjeta','AdministracionApi@verificartarjeta');
Route::get('/abonartarjeta','AdministracionApi@abonartarjeta');
Route::get('/cobrartarjeta','AdministracionApi@cobrartarjeta');
Route::get('/creartarjeta','AdministracionApi@creartarjeta');
