<?php

namespace App\Http\Controllers\Admin\Users;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class MangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取管理员用户列表
        $user = User::orderBy('id','asc')->where('auth','0')
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
            ->get();
        // 搜索条件下获取
        $manger = User::orderBy('id','asc')->where('auth','0')
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
        return view('Admin.Manger.UserList',compact('manger','user','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Manger.UserAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收数据
        $input = $request->all();

        //表单验证
        //用户名密码手机号格式验证
        $rule =[
            'username'=>'required|between:4,16',
            'pass'=>'required|between:4,16',
            'phone'=>'required',
            'repass'=>'required'
        ];
        $msg=[
            'username.required'=>'用户名必须4到16位，且不能出现空格',
            'username.between'=>'用户名必须4到16位，且不能出现空格',
            'pass.required'=>'密码必须4到16位，且不能出现空格',
            'pass.between'=>'密码必须4到16位，且不能出现空格',
            'phone.required'=>'手机号格式不正确',
            'repass.required'=>'两次密码不一致'
        ];

        $validator = Validator::make($input,$rule,$msg);
        if ($validator->fails()){
            $arr = [
                'status'=>1,
                'msg'=>'添加失败'
            ];
            return $arr;
        }
        //检查用户是否存在
        $user = User::where('username',$input['username'])->first();

        if ($user){
            $arr = [
                'status'=>1,
                'msg'=>'用户已经存在'
            ];
            return $arr;
        }
//        //密码加密
        $pass = Crypt::encrypt($input['pass']);
//
//        //执行添加
        $res = User::create([
            'username'=>$input['username'],
            'password'=>$pass,
            'phone'=>$input['phone'],
            'sex'=>$input['sex'],
            'auth'=>'0'
        ]);
        if($res) {
            $arr = [
                'status' => 0,
                'msg' => '添加成功'
            ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'添加失败'
            ];
        }

        return $arr;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
       return view('Admin.Manger.UserEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res  = User::find($id)->update($request->except('id'));
        if($res) {
            $arr = [
                'status' => 0,
                'msg' => '修改成功'
            ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }

        return $arr;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $user = User::find($id);
           $res = $user -> delete();
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
    /**
     * 管理员禁用启用
     *
     * @param
     * @return
     */
    public function changestatus(Request $request)
    {

        //获取用户id
        $id = $request->input('id');

        //获取用户状态
        $status = ($request->input('status') == 1)?  0: 1;

        //修改状态

        $user = User::find($id);
        $user->status = $status;
        $res = $user->save();
        if($res) {
            return $status;
        }else{
            return 2;
        }
    }
    /**
     * 管理员修改密码页面
     *
     * @param
     * @return
     */
    public function repass($id)
    {
        $user = User::find($id);
//        dd($user->id);
        return view('Admin.Manger.UserRepass',compact('user'));
    }
    /**
     * 管理员修改密码
     *
     * @param
     * @return
     */
    public function dorepass(Request $request,$id)
    {
        //获取用户的原密码
        $user = User::find($id);
        $oldpass = $user->password;
       //判断原密码是否正确
        if((Crypt::decrypt($oldpass))!= ($request->input('oldpass'))){
             $arr = [
                'status'=>1,
                'msg'=>'原密码不正确'
            ];
            return $arr;
        }
        //将密码进行加密
        $newpass = Crypt::encrypt($request->input('newpass'));
        $user->password = $newpass;
        $res = $user->save();
        if($res){
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
    /**
     * 管理员批量删除
     *
     * @param
     * @return
     */
    public function delall(Request $request)
    {
        $ids = $request->input('ids');
        $res = User::destroy($ids);
        if($res){
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
