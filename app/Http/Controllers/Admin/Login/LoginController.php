<?php

namespace App\Http\Controllers\Admin\Login;

<<<<<<< HEAD
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

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
=======
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
    public function index()
    {

        return view('Admin.Login.index');
    }
    //生成验证码方法
    public function captcha($tmp)
    {

>>>>>>> origin/master
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
<<<<<<< HEAD

    //验证登录信息
    public function doLogin(Request $request)
    {
        // 1.获取用户提交的登录数据(用户名,,密码,验证码)
        $input= $request->except('_token');
        //先判断验证码是否正确
        if (strtolower($input['code']) != strtolower(session()->get('code'))){
            return redirect('admin/login')->with('errors','验证码错误');
        }

        //对提交的数据进行验证(validator)
        // $validator = Validator::make(需要验证的数据,验证的规则,提示信息);
        //验证规则
        $rule = [
            'username'=>'required|between:5,10',
            'password'=>'required|between:8,16'
        ];
        $msg = [
            'username.required'=>'用户名必须不能为空',
            'username.between'=>'用户名必须在5-10位之间',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码必须在8-16位之间'
        ];
        $validator = Validator::make($input,$rule,$msg);
        if ($validator->fails()) {
=======
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
>>>>>>> origin/master
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
<<<<<<< HEAD

        //4判断是否有此用户
        $user= Users::where('username',$input['username'])->first();

        if (!$user){
            return redirect('admin/login')->with('errors','用户名不存在');
        }
        //5验证密码是否正确(加密方式)
        /*if ($input['password'] !=Crypt::decrypt($user->password)){
            return redirect('admin/login')->with('errors','密码错误');
        }*/

        //7 保存到
        //6 都正确,跳转到后台首页(路由跳转)
        return redirect('admin/index');

    }


=======
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
        //将信息保存进session
        Session::put('user',$user);

        //登陆成功跳转至后台首页
        return redirect('admin/users/manger/index');

    }
>>>>>>> origin/master
}
