<?php

namespace App\Http\Controllers\Admin\Login;

use App\Model\User;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    /*
     * 返回后台登陆页面
     * @author xxx
     * @date 2018.03.22 8:50
     * @param
     * @return 登陆页面
     */
    public function login()
    {

        return view('Admin.Login.index');
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
        $builder->setBackgroundColor(190, 190, 210);
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

    public function dologin(Request $request)
    {
        //获取数据
        $input = $request->except('_token');
        //进行初步验证
        $rule = [
            'username'=>'required|between:4,16',
            'password'=>'required|between:4,16'
        ];
        $msg = [
            'username.required'=>'用户名不能为空',
            'username.between'=>'用户名必须在4~16位',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码必须在4~16位',
        ];

        $validator = Validator::make($input,$rule,$msg);
        if ($validator->fails()){

            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        //验证码验证
        if(strtolower($input['yzm'])!=strtolower(session('code'))){
            return redirect('admin/login')->with('errors','验证码不对');
        }
        //用户名验证
        $user = User::where('username',$input['username'])->first();
        if (!$user){
            return redirect('admin/login')->with('errors','用户名或者密码错误');
        }
        //密码验证 encrypt加密 255位
        //将原密码进行解密 和输入的密码进行对比
        if($input['password']!=decrypt($user->password)){
            return redirect('admin/login')->with('errors','用户名或者密码错误');
        }
        //判断登录权限
        if ($user->auth=='2'){
            return redirect('admin/login')->with('errors','该用户没有权限');
        }
        //判断用户状态
        if ($user->status=='1'){
            return redirect('admin/login')->with('errors','该用户已被禁用');
        }
        //将信息保存进session
        Session::put('user',$user);

        //登陆成功跳转至后台首页
        return redirect('admin/index');

    }

    //后台首页
    public function index()
    {
        $user = session('user');

        return view('Admin.Common.Index',compact('user'));
    }
//    退出登录
    public function logout()
    {
        //清空登录数据
       session()->forget('user');
        return redirect('admin/login');
    }

}
