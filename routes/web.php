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
    //后台管理员路由
    //Admin\Users\MangerController
    Route::get('/admin/users/manger/index','Admin\Users\MangerController@index');
    Route::get('/admin/users/manger/list','Admin\Users\MangerController@list');

    //后台普通用户路由
//    Admin\Users\UserController
    //后台商家路由
    //Admin\Users\SellerController
    //后台商铺路由
    //Admin\Shops\ShopController
    //后台商品路由
    //Admin\Goods\GoodController
    //后台订单路由
    //Admin\Orders\OrderController

});

