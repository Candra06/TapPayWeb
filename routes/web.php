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

Route::get('/', 'HomeController@index');

Route::get('/mitra', 'MitraController@index');
Route::get('/mitra/detail/{id}', 'MitraController@show');
Route::get('/mitra/edit/{id}', function($id){return view('mitra.edit');});

Route::get('/pelanggan', 'PelangganController@index');
Route::get('/pelanggan/detail/{id}', 'PelangganController@show');
Route::get('/pelanggan/edit/{id}', function($id){return view('pelanggan.edit');});
