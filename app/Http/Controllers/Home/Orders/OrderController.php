<?php

namespace App\Http\Controllers\Home\Orders;

use App\Model\ShopInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //结算
    public function jiesuan($id)
    {
        $shopinfo = ShopInfo::find($id);
        $carts = session()->get('gcarts');
        $sum = 0;
        $sbnt = 0;
        foreach ($carts as $v){
            $sum += $v->price*$v->bnt;
            $sbnt += $v->bnt;
        }
//        dd($sum);
        return view('Homes.Orders.jiesuan',compact('sum','sbnt','shopinfo'));
    }

    //商品订单
    public function orders()
    {
        return view('Homes.Orders.orders');
    }
}
