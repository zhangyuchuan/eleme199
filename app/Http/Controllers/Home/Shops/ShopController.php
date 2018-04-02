<?php

namespace App\Http\Controllers\Home\Shops;

use App\Model\Goods;
use App\Model\ShopCategory;
use App\Model\ShopInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //商品列表
    public function lists()
    {
        //获得全部一级分类
        $cateone = ShopCategory::where('pid',0)->get();
        return view('Homes.Shops.lists',compact('cateone'));
    }
    //获得二级分类
    public function getCate(Request $request)
    {
        //获取分类id
        $id = $request->input('id');
        //获取子分类
        $catesecond = ShopCategory::where('pid',$id)->get();

        return view('Homes.Shops.ShopCate',compact('catesecond'));
    }
    //获得任何分类下的店铺
    public function getShop(Request $request)
    {
        //获取分类id
        $id = $request->input('id');
        if($id==0){
            //获取全部店铺
            $shops = ShopInfo::whereIn('status',['0','1'])
                                ->orderBy('status')
                                ->orderBy('score','desc')
                                ->get();
        }else{
            //判断是否有子类
            $ids=[];
            $ids[] = $id;
            $catesecond = ShopCategory::where('pid',$id)->get();
            if($catesecond){
                foreach($catesecond as $k=>$v){
                    $ids[] = $v->id;
                }
            }
            $shops = ShopInfo::whereIn('cateid',$ids)
                                ->whereIn('status',['0','1'])
                                ->orderBy('status')
                                ->orderBy('score','desc')
                                ->get();
        }
        return view('Homes.Shops.ShopList',compact('shops'));
    }
    //列表页搜索
    public function listDoSearch(Request $request)
    {
        $input= $request->except('_token');
        $keywords = $input['keywords'];
        //获得商品和商铺
        $shops =ShopInfo::with('goods')
//                            ->where('id',9)
//                            ->orWhere('')
                            ->where('name','like','%'.$keywords.'%')
                            ->get();
//        dd($shops);
        return view('Homes.Shops.listDoSearch',compact('keywords','shops'));
    }
    //商品详情
    public function shop()
    {
        return view('Homes.Shops.shop');
    }
}
