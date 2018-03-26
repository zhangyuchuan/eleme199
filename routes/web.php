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

    return view('welcome');

});


//后台登陆
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //首页
    Route::get('login','Login\LoginController@index');
    //生成验证码
    Route::get('code/captcha/{id}','Login\LoginController@captcha');
    //登陆验证
    Route::post('dologin','Login\LoginController@dologin');
});



Route::group([],function(){


    //后台管理员路由
    //Admin\Users\MangerController
    Route::get('/admin/users/manger/index','Admin\Users\MangerController@index');
    Route::get('/admin/users/manger/list','Admin\Users\MangerController@list');
    Route::get('/admin/users/manger/add','Admin\Users\MangerController@add');
    Route::get('/admin/users/manger/del','Admin\Users\MangerController@del');

    //后台普通用户路由
    Route::get('/admin/users/users/list','Admin\Users\UserController@list');
    Route::get('/admin/users/users/grade','Admin\Users\UserController@grade');
    Route::get('/admin/users/users/audit','Admin\Users\UserController@audit');
//    Admin\Users\UserController
    //后台商家路由
    Route::get('/admin/biz/biz/list','Admin\Biz\MerchantController@list');
    Route::get('/admin/biz/biz/grade','Admin\Biz\MerchantController@grade');
    Route::get('/admin/biz/biz/audit','Admin\Biz\MerchantController@audit');
    //Admin\Users\SellerController
    //后台商铺路由
    Route::get('/admin/shops/shop/list','Admin\Shops\ShopsController@list');
    Route::get('/admin/shops/shop/add','Admin\Shops\ShopsController@add');
    //Admin\Shops\ShopController
    //后台商品路由
    Route::get('/admin/goods/good/list','Admin\Goods\GoodsController@list');
    Route::get('/admin/goods/good/add','Admin\Goods\GoodsController@add');
    Route::get('/admin/goods/good/del','Admin\Goods\GoodsController@del');
    //Admin\Goods\GoodController
    //后台订单路由
    Route::get('/admin/order/order/list','Admin\Order\OrdersController@list');
    Route::get('/admin/order/order/add','Admin\Order\OrdersController@add');
    Route::get('/admin/order/order/del','Admin\Order\OrdersController@del');
    //Admin\Orders\OrderController

    //后台网站配置
    //批量修改网站配置项
    Route::post('/admin/config/changecontent','Admin\Config\ConfigController@changeContent');
    Route::resource('/admin/config','Admin\Config\ConfigController');

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
    