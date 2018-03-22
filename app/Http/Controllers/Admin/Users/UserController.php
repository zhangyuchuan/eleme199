<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function list()
    {
        return view('Admin.Users.UserList');
    }

    public function grade()
    {
        return view('Admin.Users.UserGrade');
    }
    public function audit()
    {
        return view('Admin.Users.UserAudit');
    }
}
