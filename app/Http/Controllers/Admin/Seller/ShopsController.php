<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Model\Shop;
use App\Model\ShopInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //获得店主id
        $id  = session('user')->id;
        //获得商铺
        $shops =ShopInfo::where('sellerid',$id)->paginate(2);
        foreach($shops as $v){
            $v->content = '<textarea  name="shopcontent" id='.$v->id.' class="layui-textarea">'.$v->content.'</textarea>';
        }

        return view('Admin.Seller.Shops.ShopsList',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //获取需要修改的店铺信息
        $shop = ShopInfo::find($id);
        return view('Admin.Seller.Shops.ShopsEdit',compact('shop'));
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
        //
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
     * 修改店铺公告
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function changecontent(Request $request)
    {
        //获取id和content
        $id = $request->input('id');
        $content = $request->input('content');

        //执行修改
        $res = ShopInfo::where('id',$id)->update(['content'=>$content]);
        if($res){
            $data = [
                'status'=>0,
                'msg' =>'修改成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
    /**
     * 营业.休息
     *
     * @param
     * @return
     */
    public function changestatus(Request $request)
    {

        //获取店铺id
        $id = $request->input('id');
        //获取店铺
        $shop = ShopInfo::find($id);
        $status = $request->input('status');

        //获取用户状态
        if($status=='2'){
            $shop->status = 3;
            $res = $shop->save();
            if($res){
                $data =[
                    'status'=>2,
                    'msg'=>'申请已发送,请等待审核通过!'
                ];
            }else{
                $data =[
                    'status'=>1,
                    'msg'=>'操作失败!'
                ];
            }

        }else{
            $status = ($request->input('status') == 1)?  0: 1;
            $shop->status = $status;
            $res = $shop->save();
            if($res){
                $data =[
                    'status'=>0,
                    'msg'=>'操作成功!!'
                ];
            }else{
                $data =[
                    'status'=>1,
                    'msg'=>'操作失败!'
                ];
            }

        }
        return $data;
    }
}
