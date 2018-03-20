<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomesController extends Controller
{
    //
    public function lists()
    {
    	return view('homes.lists');
    }

    public function orders()
    {
    	return view('homes.orders');
    }

    public function center()
    {
    	return view('homes.center');
    }

    public function shop()
    {
    	return view('homes.shop');
    }

    public function safety()
    {
        return view('homes.safety');
    }

    public function add()
    {
        return view('homes.add');
    }

    public function password()
    {
        return view('homes.password');
    }

    public function data()
    {
        return view('homes.data');
    }

    public function integral()
    {
        return view('homes.integral');
    }

    public function collect()
    {
        return view('homes.collect');
    }

    public function balance()
    {
        return view('homes.balance');
    }

    public function jiesuan()
    {
        return view('homes.jiesuan');
    }

    public function join()
    {
        return view('homes.join');
    }

    public function shangjiazhuru()
    {
        return view('homes.shangjiazhuru');
    }
}
