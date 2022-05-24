<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandType;
use App\Models\LogActivity;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $log = LogActivity::orderBy('id', 'DESC')->paginate('5');
        $brand = Brand::all()->count();
        $brandType = BrandType::all()->count();
        $brandSize = Size::all()->count();
        $brandSize = Size::all()->count();
        $user = User::all()->count();
        return view('pages.admin.dashboard.dashboard', [
            'log' => $log,
            'brand' => $brand,
            'brandType' => $brandType,
            'brandSize' => $brandSize,
            'user' => $user,
        ]);
    }
}
