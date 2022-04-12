<?php

namespace App\Http\Controllers\Admin\Size;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        return view('pages.admin.size.index');
    }

    public function create()
    {
        return view('pages.admin.size.create');
    }
}
