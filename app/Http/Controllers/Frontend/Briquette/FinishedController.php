<?php

namespace App\Http\Controllers\Frontend\Briquette;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinishedController extends Controller
{
    public function index()
    {
        return view('pages.frontend.briquette.finished.index');
    }
}
