<?php

namespace App\Http\Controllers\Frontend\Stock;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandType;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InnerController extends Controller
{
    public function index()
    {
        return view('pages.frontend.stock.inner.index');
    }

    public function create()
    {
        $brands = Brand::all();
        $BrandTypes = BrandType::all();
        $sizes = Size::all();
        return view('pages.frontend.stock.inner.create', [
            'brands' => $brands,
            'BrandTypes' => $BrandTypes,
            'sizes' => $sizes,
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        DB::beginTransaction();
        try{
            unset($request->_token);
            $auth = Auth::user();


            DB::commit();
            return redirect()->route('frontend.inner.index')->with('success', 'Berhasil menambahkan data Inner Box');
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }
}
