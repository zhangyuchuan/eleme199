<?php

namespace App\Http\Controllers\Home\Sellers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    //用户评价
    public function shopzizhi()
    {
        return view('homes.Sellers.shopzizhi');
    }

}
