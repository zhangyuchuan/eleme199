<?php

namespace App\Http\Controllers\Home\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //个人中心
    public function center()
    {
        return view('Homes.Users.center');
    }

    //安全中心
    public function safety()
    {
        return view('Homes.Users.safety');
    }

    //用户地址
    public function add()
    {
        return view('Homes.Users.add');
    }

    //用户密码
    public function password()
    {
        return view('Homes.Users.password');
    }

    //用户数据资料
    public function data()
    {
        return view('Homes.Users.data');
    }

    //用户积分
    public function integral()
    {
        return view('Homes.Users.integral');
    }

    //用户收藏
    public function collect()
    {
        return view('Homes.Users.collect');
    }

    //账户余额
    public function balance()
    {
        return view('Homes.Users.balance');
    }

    //加盟合作
    public function join()
    {
        return view('Homes.Users.join');
    }

    //用户评价
    public function evaluate()
    {
        return view('homes.Users.evaluate');
    }
}
