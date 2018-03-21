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

/*Route::get('/', function () {
    return view('welcome');
});*/
//后台登录
Route::get('/admin/login','Admin\Login\LoginController@login');

// 第三方组件生成验证码的路由
Route::get('/code/captcha/{id}','Admin\Login\LoginController@captcha');

//验证登录的路由
Route::post('admin/doLogin','Admin\Login\LoginController@doLogin');

//验证码验证
Route::get('/admin/code','Admin\Login\LoginController@code');
