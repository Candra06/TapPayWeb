<?php

use App\Http\Controllers\API\TagihanController;
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
    return view('home.login');
});
Route::post('/login', 'UsersController@login');

Route::group(['middleware' => 'loginCek'], function () {
    //  Home
        Route::get('/dashboard', 'HomeController@index');
        Route::get('/generate', 'HomeController@generate');

    //  Mitra
        ##view
        Route::get('/mitra', 'MitraController@index');
        Route::get('/mitra/detail/{id}', 'MitraController@show');
        Route::get('/mitra/edit/{id}', 'MitraController@edit');
        ##update
        Route::put('/mitra/update/{id}', 'MitraController@update');
        ##delete
        Route::get('/mitra/delete/{id}', 'MitraController@destroy');

        Route::get('/pelanggan', 'PelangganController@index');
        Route::get('/pelanggan/detail/{id}', 'PelangganController@show');
        Route::get('/pelanggan/edit/{id}', 'PelangganController@edit');
        Route::put('/pelanggan/update/{id}', 'PelangganController@update');

        Route::resource('/tagihan', 'TagihanController');
});
