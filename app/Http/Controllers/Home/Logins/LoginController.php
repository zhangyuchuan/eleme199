<?php

namespace App\Http\Controllers\Home\Logins;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //引入登录页面
    public function login()
    {

        return view('Homes.Logins.login');
    }

        //登陆验证
    public function dologin(Request $request)
    {
        $input = $request->input();
        //验证码验证
        if(strtolower($input['yzm'])!=strtolower(session('code'))){
            return redirect('home/login')->with('errors','验证码不对');
        }

        //登陆用户名或者手机或者邮箱验证
        $user = User::where('username',$input['username'])
                        ->orWhere('phone',$input['username'])
                        ->orWhere('email',$input['username'])
                        ->first();
        if (!$user){
            return redirect('home/login')->with('errors','用户不存在');
        }
        //将原密码进行解密 和输入的密码进行对比
        if($input['password']!=decrypt($user->password)){
            return redirect('home/login')->with('errors','用户名或者密码错误');
        }
        //判断用户状态
        if ($user->status=='1'){
            return redirect('home/login')->with('errors','该用户已被禁用');
        }
        //将信息保存进session

        Session::put('user',$user);

        //登陆成功跳转至后台首页
        $path = !empty(session('paths'))?session('paths'):'/lists';
        return redirect($path);
    }

    //注册
    public function register()
    {
        return view('Homes.Logins.register');
    }
    //注册验证
    public function doregister(Request $request)
    {
//        return $request->input();
        $input = $request->input();
        $username = $input['username'];
        //判断用户是否存在
        $res = User::where('username',$username)->first();
        if($res){
           $data = [
               'status'=>1,
               'msg'=>'用户已经存在'
           ];
            return $data;
        }

        //验证码验证
        if(strtolower($input['yzm'])!=strtolower(session('code'))){
            $data = [
                'status'=>1,
                'msg'=>'验证码不正确'
            ];
            return $data;
        }
        //验证密码是否一致
        if($input['password']!=$input['repwd']){
            $data = [
                'status'=>1,
                'msg'=>'两次密码不一致'
            ];
            return $data;
        }

        //密码加密
        //将原密码进行解密 和输入的密码进行对比
        $input['password']=encrypt( $input['password']);
        //执行存储
        $res = User::create(['username'=>$username ,'password'=>$input['password'],'status'=>0,'auth'=>2]);

        if($res){
            $path = !empty(session('paths'))?session('paths'):'/lists';
            $data = [
                'status'=>0,
                'msg'=>'注册成功',
                'path'=>$path
            ];
            //存进session
            Session::put('user',$res);
            return $data;
        }else{
            $data = [
                'status'=>1,
                'msg'=>'注册失败'
            ];
            return $data;
        }
    }
}

