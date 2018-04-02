<?php

namespace App\Http\Controllers\Home\Orders;

use App\Model\Orders;
use App\Model\Ordersinfo;
use App\Model\ShopInfo;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    //结算
    public function jiesuan()
    {
        return view('Homes.Orders.jiesuan');
    }

    //商品订单
    public function orders()
    {
        return view('Homes.Orders.orders');
    }

    //订单详情
    public function orderdata($id)
    {
       $order = Orders::where('oid',$id)->first();
//        dd($order);
       $sid = $order['sid'];
//       dd($sid);

        $shop = ShopInfo::where('id',$sid)->first();


        $all = Ordersinfo::with('goods')->where('oid',$id)->get();

        $shop_all = Ordersinfo::with('shopinfo')->where('oid',$id)->get();

//        dd($shop_all);

        return view('Homes.Orders.orderdata',compact('all','shop_all','shop'));
    }
}
