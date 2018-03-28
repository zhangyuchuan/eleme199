<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\GoodsCate;
use App\Model\ShopInfo;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sellerid = session('user')->id;

        $sid = ShopInfo::where('sellerid',$sellerid)->first()->id;
//        dd($sid);
        $good = Goods::orderBy('id','asc')->where('sid',$sid)
            ->where(function($query) use($request){
                //检测关键字
                $gname = $request->input('gname');
                //如果商品名不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
            })->get();
//         多条件并分页
        $goods = Goods::orderBy('id','asc')->where('sid',$sid)
            ->where(function($query) use($request){
                //检测关键字
                $gname = $request->input('gname');
                //如果商品名不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
            })
            ->paginate($request->input('num', 5));

        //商品栏位
        $goodscate = GoodsCate::where('sid',$sid)->pluck('category','id');
        //商家
        $shops = ShopInfo::pluck('name','id');
//        dd($goodscate);
        return view('Admin.Seller.Goods.GoodsList',['goods'=>$goods, 'request'=> $request,'good'=>$good,'goodscate'=>$goodscate,
            'shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellerid = session('user')->id;

        $sid = ShopInfo::where('sellerid',$sellerid)->first()->id;
        $goodscate = GoodsCate::where('sid',$sid)->get();
        //商品添加页面
        return view('Admin.Seller.Goods.GoodsAdd',compact('goodscate','sid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload(Request $request)
    {
        $file = $request -> file('fileupload');
        if ($file->isValid()){
            //            获取原文件的文件类型
            $ext = $file->getClientOriginalExtension();    //文件拓展名
//            生成新文件名
            $newfile = md5(date('YmdHis').rand(1000,9999).uniqid()).'.'.$ext;
//            1. 将文件上传到本地服务器
            //将文件从临时目录移动到制定目录
            $path = $file->move(public_path().'/uploads',$newfile);


            return $newfile;

        }
    }
    public function store(Request $request)
    {
        //接收表单数据
        $input = $request ->except('_token','fileupload');
        $res = Goods::create($input);

        if($res){
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
        return $arr;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
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
        $goods = Goods::find($id);

        $sid = $goods->sid;

        $goodscate = GoodsCate::where('sid',$sid)->get();
//        return $goodscate;

        return view('Admin/Seller/Goods/GoodsEdit',['goods'=>$goods,'id'=>$id,'goodscate'=>$goodscate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request ->except('_token','fileupload');
        $goods = Goods::find($id);
        $res = $goods->update($input);

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

    //修改状态
    public function chasta(Request $request)
    {

        $id = $request -> input('id');
        $status = $request -> input('status');
        $goods = Goods::find($id);
        $goods -> status = $status;
        $res = $goods ->save();

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $goods = Goods::find($id);
        $res = $goods -> delete();
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

    public function delall(Request $request)
    {
        $ids = $request->input('ids');
        $res = Goods::destroy($ids);
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
