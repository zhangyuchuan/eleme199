<?php

namespace App\Http\Controllers\Home\Open;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpenController extends Controller
{
    //开店申请
    public function open()
    {
        return view('Homes.Open.Open');
    }

    //开店准备资料
    public function opendata()
    {
        return view('Homes.Open.Opendata');
    }

    public function openmessage()
    {
        return view('Homes.Open.Openmessage');
    }
}
