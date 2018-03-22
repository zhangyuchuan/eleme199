<?php

namespace App\Http\Controllers\Admin\Biz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantController extends Controller
{

    public function list()
    {
        return view('Admin.Biz.ShopsList');
    }
    public function grade()
    {
        return view('Admin.Biz.ShopGrade');
    }
    public function audit()
    {
        return view('Admin.Biz.ShopAudit');
    }


}
