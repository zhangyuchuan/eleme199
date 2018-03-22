<?php

namespace App\Http\Controllers\Home\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
