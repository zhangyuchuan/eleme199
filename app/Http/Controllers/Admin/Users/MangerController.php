<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MangerController extends Controller
{
    public function index()
    {
        return view('Admin.Common.Index');
    }
    public function list()
    {
        return view('Admin.Manger.UserList');
    }

    public function add()
    {
        return view('Admin.Manger.UserAdd');
    }
    public function del()
    {
        return view('Admin.Manger.UserDel');
    }



    public function  store(Request $request)
    {
        //接受用户提交的添加信息
        $input =$request->all();
        return $input;

        //表单验证,检查用户是否注册,确认密码是否一致

        //将数据添加到数据库
        $pass =Crypt::encrypt($input['pass']);
        $res = User::create(['user_name'=>$input['username'],'user_pass'=>$pass]);

         if($res){
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
             $arr = [
                 'status'=>0,
                 'msg'=>'添加成功'
             ];
         }else{
             $arr = [
                 'status'=>1,
                 'msg'=>'添加失败'
             ];
         }

//        json_encode($arr);
//        return response()->json($arr);

        return $arr;
    }

    //成功跳转


}
