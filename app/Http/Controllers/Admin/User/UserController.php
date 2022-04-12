<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.admin.user.index');
    }

    public function create()
    {
        return view('pages.admin.user.create');
    }
}
