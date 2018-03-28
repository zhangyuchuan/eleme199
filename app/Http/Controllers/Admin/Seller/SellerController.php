<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        //列表页
            //获取个人信息列表
            $user = User::find(session('user')->id);
            return view('Admin.Seller.Sellers.SellerList',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
//        dd($user);
        return view('Admin.Seller.Sellers.SellerEdit',compact('user'));
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
        //
    }

    /**
     * 修改密码页面
     *
     * @param
     * @return
     */
    public function repass($id)
    {
        $user = User::find($id);
//        dd($user->id);
        return view('Admin.Seller.Sellers.SellerRepass',compact('user'));
    }
    /**
     * 修改密码
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
}
