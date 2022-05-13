<?php

namespace App\Http\Controllers\Frontend\Briquette;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandType;
use App\Models\Size;
use Illuminate\Http\Request;

class SemiFinishedController extends Controller
{
    public function index()
    {
        return view('pages.frontend.briquette.semi-finished.index');
    }

    public function create()
    {
        $brands = Brand::all();
        $BrandTypes = BrandType::all();
        $sizes = Size::all();
        return view('pages.frontend.briquette.semi-finished.create',[
            'brands' => $brands,
            'BrandTypes' => $BrandTypes,
            'sizes' => $sizes,
        ]);
    }
}
