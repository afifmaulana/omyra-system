<?php

namespace App\Http\Controllers\Frontend\Stock;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandType;
use App\Models\Size;
use App\Models\Stock;
use Carbon\Carbon;
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
        // dd($request->all());
        $params = $this->validate($request, [
            'date' => 'required',
            'brand_id' => 'required',
            'brand_type_id' => 'required',
            'brand_size_id' => 'required',
            'stock_total' => 'required',
        ]);
        DB::beginTransaction();
        try{
            $params['date'] = Carbon::parse($params['date'])->format('Y-m-d');
            $params['user_id'] = auth()->id();
            $params['stock_type'] = 'INNER';
            $params['stock_left'] = $params['stock_total'];
            Stock::create($params);


            DB::commit();
            return redirect()->route('frontend.inner.index')->with('success', 'Berhasil menambahkan data Inner Box');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            // return redirect()->back
        }

    }
}
