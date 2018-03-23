<?php

namespace App\Http\Controllers\Admin\Shops;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('Admin.Shops.ShopsList');
    }

    public function add()
    {
        return view('Admin.Shops.ShopsAdd');
    }
}
