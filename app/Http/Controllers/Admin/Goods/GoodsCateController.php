<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Model\Goods;
use App\Model\GoodsCate;
use App\Model\ShopInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shops = ShopInfo::pluck('name','id');
        $count = $goodscate = GoodsCate::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $sid = $request->input('sid');
                //如果商铺编号不为空
                if(!empty($sid)) {
                    $query->where('sid',$sid);
                }
            })->count();
        //多条件并分页
        $goodscate = GoodsCate::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $sid = $request->input('sid');
                //如果商铺编号不为空
                if(!empty($sid)) {
                    $query->where('sid',$sid);
                }
            })
            ->paginate($request->input('num', 5));
        //显示列表页
        return view('Admin.Goods.GoodsCateList',['goodscate'=>$goodscate,'request'=>$request,'count'=>$count,'shops'=>$shops]);
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
        //
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
        $goods = Goods::where('gcid',$id)->first();
        if (!$goods){
            $goodscate = GoodsCate::find($id);
            $res = $goodscate -> delete();
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
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'栏位下有商品不能删除'
            ];
        }



        return $arr;
    }

    public function statusup(Request $request)
    {
        $id= $request -> input('id');
        //return $uid;
        $goodscate = GoodsCate::find($id);
        $goodscate->status = 1;
        $res = $goodscate ->save();
        if ($res){
            return 1;
        }else{
            return 0;
        }

    }
    public function statusdown(Request $request)
    {
        $id= $request -> input('id');
//            return $uid;
        $goodscate = GoodsCate::find($id);
        $goodscate->status = 0;
        $res = $goodscate ->save();
        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

    //批量删除
    public function delall(Request $request)
    {
        $ids = $request->input('ids');
        foreach ($ids as $k => $v){
            $goods = Goods::where('id',$v)->first();
            if ($goods){
                $arr =[
                    'status'=>2,
                    'msg'=>'删除失败,id为:'.$v.'的栏位存在子类'
                ];
                return $arr;
            }
        }
        $res = GoodsCate::destroy($ids);
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
