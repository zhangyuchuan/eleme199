<?php

namespace App\Http\Controllers\Home\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //个人中心
    public function center()
    {
        return view('homes.Users.center');
    }

    //安全中心
    public function safety()
    {
        return view('homes.Users.safety');
    }

    //用户地址
    public function add()
    {
        return view('homes.Users.add');
    }

    //用户密码
    public function password()
    {
        return view('homes.Users.password');
    }

    //用户数据资料
    public function data()
    {
        return view('homes.Users.data');
    }

    //用户积分
    public function integral()
    {
        return view('homes.Users.integral');
    }

    //用户收藏
    public function collect()
    {
        return view('homes.Users.collect');
    }

    //账户余额
    public function balance()
    {
        return view('homes.Users.balance');
    }

    //加盟合作
    public function join()
    {
        return view('homes.Users.join');
    }
}
