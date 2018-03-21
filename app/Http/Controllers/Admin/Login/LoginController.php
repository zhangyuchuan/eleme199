<?php

namespace App\Http\Controllers\Admin\Login;

use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class LoginController extends Controller
{
    //登录界面
    public function login()
    {
        //引入登录界面
        return view('Admin.Login.login');
    }

    //生成验证码方法
    public function captcha($tmp)
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(255, 153, 0);
        $builder->setMaxAngle(35);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    //验证登录信息
    public function doLogin(Request $request)
    {
        $input= $request -> input('code');
        if (session('code') != $input)
        {
            return back()->with('msg','验证码不正确');
        }
        $user= $request -> only(['username','password']);
//        $res = Users::where(['name'=>$user['username'],'password'=>$user['password']])->firstOrFail();
        $res = Users::where('name',$user['username'])->where('password',$user['password'])->first();
//        dd($res);
        if ($res){
            session('adminUserInfo',$user['username']);
            session('adminFlagInfo',true);
            echo 1;
        }else{
            return back()->with('msg','用户名或密码不正确');
        }

    }

   /* public function code(Request $request)
    {
//        $tmp = $request ->a;
//        echo $tmp;
            $a = $_GET['a'];
            echo $a;
        if (session('code')==$a){
            echo 1;
        }else{
            echo 0;
        }
//        echo session('code');
    }*/
}
