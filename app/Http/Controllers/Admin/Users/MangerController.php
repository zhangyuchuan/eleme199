<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MangerController extends Controller
{
    public function index()
    {
        return view('Admin.Common.Index');
    }
    public function list()
    {
        return view('Admin.Manger.UserList');
    }

    public function add()
    {
        return view('Admin.Manger.UserAdd');
    }
    public function del()
    {
        return view('Admin.Manger.UserDel');
    }

}
