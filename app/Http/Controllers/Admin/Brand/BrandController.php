<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('pages.admin.brand.index');
    }

    public function create()
    {
        return view('pages.admin.brand.create');
    }
}