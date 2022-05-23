<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use App\Models\Stock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        $total_inner = Stock::where('stock_type', 'INNER')->sum('stock_total');
        $total_master = Stock::where('stock_type', 'MASTER')->sum('stock_total');
        $total_plastic = Stock::where('stock_type', 'PLASTIC')->sum('stock_total');
        $log = LogActivity::orderBy('id', 'DESC')->paginate('5');


        return view('pages.frontend.dashboard.dashboard', [
            'log' => $log,
            'total_inner' => $total_inner,
            'total_master' => $total_master,
            'total_plastic' => $total_plastic,
        ]);
    }
}
