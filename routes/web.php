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
Route::group(['middleware'=>'Islogin'],function() {
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
    Route::post('/admin/goods/upload', 'Admin\Goods\GoodsController@upload');
    Route::resource('/admin/goods', 'Admin\Goods\GoodsController');
    //后台商品分类路由
    Route::post('/admin/goodscate/statusup', 'Admin\Goods\GoodsCateController@statusup');
    Route::post('/admin/goodscate/statusdown', 'Admin\Goods\GoodsCateController@statusdown');
    Route::resource('/admin/goodscate', 'Admin\Goods\GoodsCateController');


    //后台普通用户路由
    Route::post('/admin/users/users/changestatus','Admin\Users\UserController@changestatus');
    Route::get('/admin/users/users/info','Admin\Users\UserController@info');
    Route::post('/admin/users/users/del/{id}','Admin\Users\UserController@del');

    Route::get('/admin/users/users/grade','Admin\Users\UserController@grade');
    Route::get('/admin/users/users/audit','Admin\Users\UserController@audit');
    Route::get('/admin/users/users/delall', 'Admin\Users\UserController@delall');
    Route::resource('/admin/users/users','Admin\Users\UserController');
    //后台用户修改状态

    //后台订单
    Route::get('/admin/order/order/info','Admin\Order\OrdersController@info');
    Route::get('/admin/order/order/list','Admin\Order\OrdersController@List');
    Route::post('/admin/order/order/changestatus','Admin\Order\OrdersController@changestatus');
    Route::resource('/admin/order/order','Admin\Order\OrdersController');


    //后台网站配置
    //批量修改网站配置项
    Route::post('/admin/config/changecontent','Admin\Config\ConfigController@changeContent');
    Route::resource('/admin/config','Admin\Config\ConfigController');









    //店家后台个人信息
//    Admin\Seller\SellerController
    //店家后台我的店铺
//    Admin\Seller\ShopsController
    Route::get('admin/seller/shops/changecontent', 'Admin\Seller\ShopsController@changecontent');
    Route::resource('admin/seller/shops', 'Admin\Seller\ShopsController');
    //店家后台商品管理
//    Admin\Seller\GoodsControlelr
    //店家后台订单统计
//    Admin\Seller\OrdersController

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
    //用户红包
    Route::get('/hongbao','Home\Users\UserController@hongbao');
    //订单完成
    Route::get('/overorder','Home\Orders\OrderController@overorder');


