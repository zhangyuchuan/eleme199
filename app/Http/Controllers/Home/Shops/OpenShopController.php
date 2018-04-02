<?php

namespace App\Http\Controllers\Home\Shops;

use App\Model\ShopCategory;
use App\Model\ShopInfo;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OpenShopController extends Controller
{
    //开店首页
    public function  index()
    {
        return view('Homes.Open.Open');
    }
    //开店资质页
    public function opendata(Request $request)
    {
            return view('Homes.Open.Opendata');
    }
    //开店信息采集页
    public function openmessage()
    {
        return view('Homes.Open.Openmessage');
    }
    //开店信息采集表单
    public function storeform()
    {
        //获得一级分类
        $cateone = ShopCategory::where('pid','0')->get();
        //获取登陆的用户信息
        $user =session('user');

        return view('Homes.Open.store',compact('cateone','user'));
    }
    //获取二级分类
    public function getsecond(Request $request)
    {

        $idone = $request->input();
        //获得二级分类
        $catesecond = ShopCategory::where('pid',$idone)->get();

//        dd($catesecond);
        return $catesecond;

    }
    //表单处理
    public function doform(Request $request)
    {

        $input = $request->input();
        //获取表单提交数据
        //获取用户id
        $uid = $input['userid'];
        //店铺名字
        $shopname = $input['name'];
        //店铺分类
        $cateid = $input['catesecond'];
        //营业时间
        $time = $input['time'];
        //店铺地址
        $address = $input['s_province'].$input['s_city'].$input['s_county'].$input['addressdetail'];

        //店铺logo
        $logo  = $input['logopath'];
        //设置店铺状态为3 审核状态
        $status= 3;
        //判断用户状态并将用户好好状态设置为1商家权限
        $user = User::where('id',$uid)->first();
        if($user->auth==2){
            $user->auth = 1;
        }
        //执行存储
        $shop = new ShopInfo;
        $shop->sellerid = $uid;
        $shop->name =$shopname;
        $shop->cateid =$cateid;
        $shop->time =$time;
        $shop->address =$address;
        $shop->logo =$logo;
        $shop->status =$status;
        $res = $shop->save();
        //跳转等待审核界面
        if($res){
            return redirect('/home/openlast');
        }else{
            return back()->with('errors','提交失败');
        }

        //跳转商家后台登陆页面
    }
    //表单审核
    public function openlast()
    {
        return view('Homes.Open.openlast');
    }

    //表单上传图片处理
    public function uploadfile(Request $request)
    {
        $file = $request->file('logo');
        if($file->isValid()) {
//            获取原文件的文件类型
            $ext = $file->getClientOriginalExtension();    //文件拓展名
//            生成新文件名
            $newfile = date('YmdHis').rand(1000,9999).'.'.$ext;
//            1. 将文件上传到本地服务器
            //将文件从临时目录移动到制定目录
            $path = $file->move(public_path().'/uploads',$newfile);
            //将上传文件的路径返回给客户端
            return $newfile;
        }

    }


}
