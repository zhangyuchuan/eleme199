<?php

namespace App\Http\Controllers\Home\Orders;

use App\Model\Goods;
use App\Model\ShopInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //结算
    public function jiesuan()
    {

        $shopinfo = ShopInfo::find(20);
        $goods = goods::find(3);
        return view('Homes.Orders.jiesuan',compact('shopinfo','goods'));
    }

    //商品订单
    public function orders()
    {
        return view('Homes.Orders.orders');
    }

    public function overorder()
    {
        return view('Homes.Orders.overorder');
    }

}
