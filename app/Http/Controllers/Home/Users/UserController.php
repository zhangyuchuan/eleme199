<?php

namespace App\Http\Controllers\Home\Users;

use App\Model\Address;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{


    //安全中心
    public function safety()
    {
        //return view('Homes.Users.safety');
        $users = User::find(1);
        return view('Homes.Users.safety', ['users' => $users]);
    }

    //用户地址
    public function add()
    {
        //return view('Homes.Users.add');
        $users = User::with('useraddr')->find(1);
//        dd($users->useraddr);
        return view('Homes.Users.add', ['users' => $users]);
    }

    //添加地址
    public function create()
    {
        $address = Address::find(1);
       return view('Homes.Users.UserInfo.addaddress', ['address' => $address]);
        //return view('Homes.Users.UserInfo.addaddress');
    }

    public function store(Request $request)
    {
        // 接收数据
        $input = $request->except('_token');
//  dd($input);
        //表单验证
//        $rule = [
//            'phone' => 'required'
//        ];
//        $msg = [
//            'phone.required' => '手机号格式不正确'
//        ];
//        $validator = Validator::make($input, $rule, $msg);
//        if ($validator->fails()) {
//            $arr = [
//                'status' => 1,
//                'msg' => '添加失败'
//            ];
//            return $arr;
//        }
        //执行添加 DB::table('users')->insert   Address::create
        $res = Address::create([
            'uid'=>1,
            'rec'=>$input['rec'],
            'addr'=>$input['address1'].$input['address2'],
            'tel'=>$input['tel'],
            'sex'=>$input['sex'],
//            'auth'=>tel
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

      //  return $arr;
        return view('Homes.Users.add');
    }

    //删除地址
    public function delete($id)
    {
        $res= Address::destroy($id);

        if($res) {
            return redirect('/add');

        }else{
            return back();
        }
    }

    //修改地址
    public function modify($id)
    {
        $address = Address::find($id);
        return view('Homes.Users.UserInfo.modify', ['address' => $address]);
        //return view('Homes.Users.UserInfo.addaddress');
    }
    public function storemodify(Request $request,$id)
    {
//        获取用户的ID
        // 1.根据id获取要修改的用户
        $user = Address::find($id);
        // 接收数据

        $input = $request->except('_token');
 // dd($input);


        $user->rec=$input['rec'];

        $user->addr=$input['addr'];
        $user->tel=$input['tel'];
        $user->sex=$input['sex'];
//            'auth'=>tel

        $res= $user->save();
        if($res) {
            return redirect('/add');

        }else{
           return back();
        }

        //  return $arr;

    }
    //用户密码
    public function password()
    {
        $users  = User::find(1);

        return view('Homes.Users.password',['user'=>$users]);
    }
    //修改密码
    public function repass(Request $request)
    {
        $users  = User::find(1);
        $oldpass = $users->password;
        // dd($oldpass);
        //判断原密码是否正确
        if((Crypt::decrypt($oldpass))!= ($request->input('oldpass'))){
            $arr = [
                'status'=>1,
                'msg'=>'原密码不正确'
            ];
            return $arr;

        }else{
            $this->validate($request, [

                'newpass' => 'regex:/^[\S]{4,16}$/',
                'repass'=>'same:newpass',

            ],[

                'newpass.regex' => '密码格式不正确',
                'repass.same'=>'两次密码不一致',

            ]);
        }

        //将密码进行加密
        $newpass = Crypt::encrypt($request->input('newpass'));


        $users->password = $newpass;
        $res = $users->save();
        if($res){
            return redirect('/center');
        }else{
            return back();
        }
    }


    //用户数据资料
    public function data()
    {
       // return view('Homes.Users.data');
        //获取数据
        $users  = User::find(1);
        //dd($users);
       // dd(session());
        return view('Homes.Users.data',['users'=>$users]);
    }

    //公共
    public function public()
    {
        return view('Homes.Users.public.public');
    }

}