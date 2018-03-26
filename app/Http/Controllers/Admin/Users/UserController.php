<?php

namespace App\Http\Controllers\Admin\Users;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
//    public function list()
//    {
//        return view('Admin.Users.UserList');
//    }
//
    public function grade()
    {
        return view('Admin.Users.UserGrade');
    }
    public function audit()
    {
        return view('Admin.Users.UserAudit');
    }

    public function index(Request $request)
    {

        $users =User::where('auth','2')->get();
//
         return view('Admin.Users.UserList',['users'=>$users,'request'=> $request]);





    }


    public function destroy($id)
    {
        $user = user::find($id);

        $res = $user->delete();
        if($res){
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
            $arr = [
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }

        return $arr;
    }


    public function changestatus(Request $request)
    {

//        return 11111;
        //用户id
        $id = $request->input('id');
        //用户的状态
        $status =  ($request->input('status') == 1)? 0:1;

        //修改状态
        $user = user::find($id);
        $res = $user->update(['status'=>$status]);

        if($res){
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
            $arr = [
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }

        return $arr;



    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('Admin.Users.UserGrade',compact('users'));
    }

    public function update(Request $request, $id)
    {
//        return 11111;
//        1. 获取提交的数据
        $username = $request->input('username');

//        2. 根据id找到要修改的用户
        $user = User::find($id);

//        3. 将用户的属性改成提交过来的值
        $res = $user->update(['user_name'=>$username]);


//        4. 如果修改成功，返回成功信息；失败就返回失败信息
        if($res){
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
            $arr = [
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }

        return $arr;
    }




}
