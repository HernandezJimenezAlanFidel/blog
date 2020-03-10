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

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio','InicioController@index');
Route::get('categorias','InicioController@categorias');
Route::get('cortecaja','InicioController@cortecaja');
Route::get('base','InicioController@base');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
