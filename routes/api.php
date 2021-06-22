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
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'API\AuthController@login');
    Route::post('signupMitra', 'API\AuthController@signupMitra');
    Route::post('signupPelanggan', 'API\AuthController@signupPelanggan');

    Route::group(['middleware' => 'auth:api' ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });

});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'mitra'], function(){
        Route::get('paket/', 'API\PaketController@index');
        Route::get('paket/{id}', 'API\PaketController@show');
        Route::post('paket/create', 'API\PaketController@store');
        Route::post('paket/edit/{id}', 'API\PaketController@update');
        Route::get('paket/delete/{id}', 'API\PaketController@destroy');
        Route::get('listPelanggan', 'API\PelangganController@listPelanggan');
        Route::get('home', 'API\PelangganController@homeMitra');


    });

    Route::group(['prefix' => 'langganan'], function(){
        Route::post('create', 'API\PelangganController@createInvitation');
        Route::post('invite', 'API\PelangganController@inputInvitation');
    });

    Route::group(['prefix' => 'tagihan'], function(){
        Route::post('generate', 'API\TagihanController@generate');
        Route::get('payable/{idPayer}', 'API\TagihanController@payable');
        Route::get('list', 'API\TagihanController@historyTagihan');
        Route::get('detail/{id}', 'API\TagihanController@detailTagihan');
        Route::get('pelanggan/{id}', 'API\TagihanController@detailTagihanPelanggan');
        Route::post('pembayaran', 'API\TagihanController@createTagihan');
        Route::post('update', 'API\TagihanController@updateTagihan');
    });

    Route::group(['prefix' => 'pelanggan'], function(){
        Route::get('list', 'API\PelangganController@index');
        Route::get('detail/{id}', 'API\PelangganController@detail');
        Route::get('home', 'API\PelangganController@homePelanggan');
    });
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
