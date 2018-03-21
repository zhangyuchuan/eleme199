<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function shop()
    {
        return view('homes.shopzizhi');
    }

    public function evaluate()
    {
        return view('homes.evaluate');
    }
}
