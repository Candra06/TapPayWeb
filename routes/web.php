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
    return view('home.index');
});

Route::get('/mitra', function(){return view('mitra.index');});
Route::get('/mitra/detail/{id}', function($id){return view('mitra.detail');});
Route::get('/mitra/edit/{id}', function($id){return view('mitra.edit');});

Route::get('/pelanggan', function(){return view('pelanggan.index');});
Route::get('/pelanggan/detail/{id}', function($id){return view('pelanggan.detail');});
Route::get('/pelanggan/edit/{id}', function($id){return view('pelanggan.edit');});
