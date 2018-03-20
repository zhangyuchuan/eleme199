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
    return view('homes.shouye');
});

Route::group([],function(){
	
	Route::get('/lists','homes\HomesController@lists');
	
	Route::get('/orders','homes\HomesController@orders');

	Route::get('/center','homes\HomesController@center');

	Route::get('/shop','homes\HomesController@shop');

	Route::get('/safety','homes\HomesController@safety');

    Route::get('/add','homes\HomesController@add');

    Route::get('/password','homes\HomesController@password');

    Route::get('/data','homes\HomesController@data');

    Route::get('/integral','homes\HomesController@integral');

    Route::get('/collect','homes\HomesController@collect');

    Route::get('/balance','homes\HomesController@balance');

    Route::get('/jiesuan','homes\HomesController@jiesuan');

    Route::get('/join','homes\HomesController@join');

    Route::get('/shangjiazhuru','homes\HomesController@shangjiazhuru');
});
