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



    //个人中心
    Route::get('/center','Home\Users\UserController@center');
    //安全中心
	Route::get('/safety','Home\Users\UserController@safety');
    //用户地址
    Route::get('/add','Home\Users\UserController@add');
    //用户密码
    Route::get('/password','Home\Users\UserController@password');
    //用户数据资料
    Route::get('/data','Home\Users\UserController@data');
    //用户积分
    Route::get('/integral','Home\Users\UserController@integral');
    //用户收藏
    Route::get('/collect','Home\Users\UserController@collect');
    //账户余额
    Route::get('/balance','Home\Users\UserController@balance');
    //加盟合作
    Route::get('/join','Home\Users\UserController@join');
    //登录
    Route::get('/login','Home\Logins\LoginController@login');
    //注册
    Route::get('/register','Home\Logins\LoginController@register');
    //商品详情
    Route::get('/shop','Home\Shops\ShopController@shop');
    //商品列表
    Route::get('/lists','Home\Shops\ShopController@lists');
    //商品订单
    Route::get('/orders','Home\Orders\OrderController@orders');
    //结算
    Route::get('/jiesuan','Home\Orders\OrderController@jiesuan');

