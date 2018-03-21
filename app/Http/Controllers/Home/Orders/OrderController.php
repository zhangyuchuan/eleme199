<?php

namespace App\Http\Controllers\Home\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //结算
    public function jiesuan()
    {
        return view('homes.Orders.jiesuan');
    }

    //商品订单
    public function orders()
    {
        return view('homes.Orders.orders');
    }
}
