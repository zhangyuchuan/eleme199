<?php

namespace App\Http\Controllers\Home\Shops;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //商品列表
    public function lists()
    {
        return view('homes.Shops.lists');
    }

    //商品详情
    public function shop()
    {
        return view('homes.Shops.shop');
    }
}
