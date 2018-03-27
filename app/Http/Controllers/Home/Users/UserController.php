<?php

namespace App\Http\Controllers\Home\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //个人中心
    public function center()
    {
        return view('Homes.Shops.center');
    }

    //安全中心
    public function safety()
    {
        return view('Homes.Shops.safety');
    }

    //用户地址
    public function add()
    {
        return view('Homes.Shops.add');
    }

    //用户密码
    public function password()
    {
        return view('Homes.Shops.password');
    }

    //用户数据资料
    public function data()
    {
        return view('Homes.Shops.data');
    }

    //用户积分
    public function integral()
    {
        return view('Homes.Shops.integral');
    }

    //用户收藏
    public function collect()
    {
        return view('Homes.Shops.collect');
    }

    //账户余额
    public function balance()
    {
        return view('Homes.Shops.balance');
    }

    //加盟合作
    public function join()
    {
        return view('Homes.Shops.join');
    }
}
