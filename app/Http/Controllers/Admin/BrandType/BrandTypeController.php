<?php

namespace App\Http\Controllers\Admin\BrandType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandTypeController extends Controller
{
    public function index()
    {
        return view('pages.admin.brand-type.index');
    }

    public function create()
    {
        return view('pages.admin.brand-type.create');
    }
}
