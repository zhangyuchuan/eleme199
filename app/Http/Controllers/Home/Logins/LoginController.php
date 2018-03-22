<?php

namespace App\Http\Controllers\Home\Logins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登录
    public function login()
    {
        return view('Homes.Logins.login');
    }

    //注册
    public function register()
    {
        return view('Homes.Logins.register');
    }
}
