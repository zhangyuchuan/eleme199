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

//网站首页

Route::get('/', function () {


    return view('welcome');


});
//后台登陆
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //登录首页
    Route::get('login','Login\LoginController@login');
    //生成验证码
    Route::get('code/captcha/{id}','Login\LoginController@captcha');
    //登陆验证
    Route::post('dologin','Login\LoginController@dologin');

});




//后台路由组
Route::group(['middleware'=>'adminIslogin'],function() {
    // 退出登录
    Route::get('/admin/logout', 'Admin\Login\LoginController@logout');
    //后台首页路由
    Route::get('/admin/index', 'Admin\Login\LoginController@index');

    //后台管理员路由
    //Admin\Users\MangerController
    Route::post('/admin/users/manger/status', 'Admin\Users\MangerController@changestatus');
    Route::get('/admin/users/manger/repass/{id}', 'Admin\Users\MangerController@repass');
    Route::post('/admin/users/manger/dorepass/{id}', 'Admin\Users\MangerController@dorepass');
    Route::get('/admin/users/manger/delall', 'Admin\Users\MangerController@delall');
    Route::resource('/admin/users/manger', 'Admin\Users\MangerController');


    //后台商铺路由 Admin\Shops\ShopController
    //管理员修改排序
    Route::post('/admin/shops/changeorder', 'Admin\Shops\ShopsController@changeorder');
    //管理员修改店铺状态
    Route::post('/admin/shops/changestatus', 'Admin\Shops\ShopsController@changestatus');
    //管理员删除店铺
    Route::post('/admin/shops/delete/{id}', 'Admin\Shops\ShopsController@deleteshop');
    Route::resource('/admin/shops', 'Admin\Shops\ShopsController');


    //后台商品路由 Admin\Goods\GoodController
    Route::post('/admin/goods/delall','Admin\Goods\GoodsController@delall');
    Route::post('/admin/goods/upload', 'Admin\Goods\GoodsController@upload');
    Route::resource('/admin/goods', 'Admin\Goods\GoodsController');

    //后台商品分类路由
    Route::post('/admin/goodscate/delall','Admin\Goods\GoodsCateController@delall');
    Route::post('/admin/goodscate/statusup', 'Admin\Goods\GoodsCateController@statusup');
    Route::post('/admin/goodscate/statusdown', 'Admin\Goods\GoodsCateController@statusdown');
    Route::resource('/admin/goodscate', 'Admin\Goods\GoodsCateController');

    //后台普通用户路由
    Route::get('/admin/users/users/grade','Admin\Users\UserController@grade');
    Route::get('/admin/users/users/audit','Admin\Users\UserController@audit');
    Route::resource('/admin/users/users','Admin\Users\UserController');
    //后台用户修改状态
    Route::post('/admin/users/users/changestatus','Admin\Users\UserController@changestatus');

    //后台商家路由
    Route::get('/admin/biz/biz/list','Admin\Biz\MerchantController@list');
    Route::get('/admin/biz/biz/grade','Admin\Biz\MerchantController@grade');
    Route::get('/admin/biz/biz/create','Admin\Biz\MerchantController@create');
    //删除
    Route::post('/admin/biz/biz/destroy/{id}','Admin\Biz\MerchantController@destroy');
    //禁用启用
    Route::post('/admin/biz/biz/changestatus','Admin\Biz\MerchantController@changestatus');
    //批量删除
    Route::get('/admin/biz/biz/delall','Admin\Biz\MerchantController@delall');
    Route::get('/admin/biz/biz/audit','Admin\Biz\MerchantController@audit');

    //后台网站配置
    //批量修改网站配置项
    Route::post('/admin/config/changecontent','Admin\Config\ConfigController@changeContent');
    Route::resource('/admin/config','Admin\Config\ConfigController');

    //店家后台个人信息
//    Admin\Seller\SellerController
    //店家后台我的店铺
//    Admin\Seller\ShopsController
    Route::get('admin/seller/shops/changecontent', 'Admin\Seller\ShopsController@changecontent');
    Route::get('admin/seller/shops/changetime', 'Admin\Seller\ShopsController@changetime');
    Route::post('admin/seller/shops/changestatus', 'Admin\Seller\ShopsController@changestatus');
    Route::post('admin/seller/shops/uploadfile', 'Admin\Seller\ShopsController@uploadfile');
    Route::resource('admin/seller/shops', 'Admin\Seller\ShopsController');
    //店家后台商品管理
//    Admin\Seller\GoodsControlelr
    Route::post('/admin/seller/goods/delall','Admin\Seller\GoodsController@delall');
    Route::post('/admin/seller/goods/upload', 'Admin\Seller\GoodsController@upload');
    Route::post('/admin/seller/goods/chasta', 'Admin\Seller\GoodsController@chasta');
    Route::resource('admin/seller/goods','Admin\Seller\GoodsController');

    //店家后台分类路由
    Route::post('/admin/seller/goodscate/delall','Admin\Seller\GoodsCateController@delall');
    Route::post('/admin/seller/goodscate/statusup', 'Admin\Seller\GoodsCateController@statusup');
    Route::post('/admin/seller/goodscate/statusdown', 'Admin\Seller\GoodsCateController@statusdown');
    Route::resource('/admin/seller/goodscate', 'Admin\Seller\GoodsCateController');

    //店家后台订单统计
    //    Admin\Seller\OrdersController

});

//前台登陆注册
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){
    //登录
    Route::get('/login','Logins\LoginController@login');
    //登陆验证
    Route::post('/dologin','Logins\LoginController@dologin');
    //注册
    Route::get('/register','Logins\LoginController@register');
    Route::post('/doregister','Logins\LoginController@doregister');

});

//前台路由组

Route::group(['middleware'=>'homeIslogin'],function(){
    //商品订单
    Route::get('/orders','Home\Orders\OrderController@orders');
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

});
    //商品列表
    Route::get('/lists','Home\Shops\ShopController@lists');
    //加盟合作
    Route::get('/join','Home\Users\UserController@join');
    //店铺详情详情
    Route::get('/shop/{id}','Home\Shops\ShopController@shop');
    //店铺评价
    Route::get('/shop/{id}/rate','Home\Shops\ShopController@rate');
    //商品详情
    Route::get('/home/show','Home\Shops\ShopController@show');
    //加入购物车
    Route::get('/home/addcart','Home\Shops\ShopController@addCart');
    //减购物车的商品数量
    Route::get('/home/delgcart','Home\Shops\ShopController@delgcart');
    //加购物车的商品的数量
    Route::get('/home/addgcart','Home\Shops\ShopController@addgcart');
    //结算
    Route::get('/shop/{id}/jiesuan','Home\Orders\OrderController@jiesuan');
    //商家资质
    Route::get('/shopzizhi','Home\Sellers\SellerController@shopzizhi');
    //用户评价
    Route::get('/evaluate','Home\Users\UserController@evaluate');
    //我的资料开始
    //我的资料结束
    //公共左
    Route::get('/public','Home\Users\UserController@public');
