<?php

namespace App\Http\Controllers\Admin\Users;

use App\Model\User;
use App\Model\UserInfo;
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

        // 搜索条件下获取
        $users = User::orderBy('id','asc')->where('auth','2')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                $sex = $request->input('sex');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
                //如果性别不为空
                if(!empty($sex)) {
                    $query->where('sex',$sex);
                }
            })
            ->paginate($request->input('num', 3));


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

    public function show($id){

    }
//    public function info()
//    {
////        $userinfo = User::findOrFail($id);
//        return view('Admin.Users.UserInfo');
//    }
    public function info(Request $request)
    {

        // 搜索条件下获取
        $userinfo = UserInfo::orderBy('id','asc')->where(function($query) use($request){
                //检测关键字
                $uname = $request->input('uname');
                $sex = $request->input('sex');
                //如果用户名不为空
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
                //如果性别不为空
                if(!empty($sex)) {
                    $query->where('sex',$sex);
                }
            })
            ->paginate($request->input('num', 3));


//
        return view('Admin.Users.UserInfo',['userinfo'=>$userinfo,'request'=> $request]);





    }
    public function del($id)
    {
        $userinfo = userinfo::find($id);

        $res = $userinfo->delete();
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


}
