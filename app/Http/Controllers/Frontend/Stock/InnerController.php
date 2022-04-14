<?php

namespace App\Http\Controllers\Frontend\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InnerController extends Controller
{
    public function index()
    {
        return view('pages.frontend.stock.inner.index');
    }

    public function create()
    {
        return view('pages.frontend.stock.inner.create');
    }
}
