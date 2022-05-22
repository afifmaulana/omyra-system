<?php

namespace App\Http\Controllers\Frontend\Stock;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandType;
use App\Models\LogActivity;
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
            $stock = Stock::create($params);

            $title = Auth::user()->name . ' telah menambahkan stok ' . $stock->stock_type . $stock->stock_total;
            $description = Auth::user()->name . ' telah menambahkan stok ' . $stock->stock_type . $stock->stock_total;
            $log = new LogActivity();
            $log->user_id = Auth::user()->id;
            $log->source_id = $stock->id;
            $log->source_type = '\App\Stock';
            $log->title = $title;
            $log->description = $description;
            $log->save();


            DB::commit();
            return redirect()->route('frontend.inner.index')->with('success', 'Berhasil menambahkan data Inner Box');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            // return redirect()->back
        }
    }

    public function edit($id)
    {
        $stock = Stock::where('id', $id)->first();
        $brand = Brand::all();
        $sizes = Size::all();
        return view('pages.frontend.stock.inner.edit', [
            'stock' => $stock,
            'brand' => $brand,
            'sizes' => $sizes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $this->validate($request, [
            'date' => 'required',
            'brand_id' => 'required',
            'brand_type_id' => 'required',
            'brand_size_id' => 'required',
            'stock_total' => 'required',
        ]);

        $stock = Stock::where('id', $id)->first();
        $params['date'] = Carbon::parse($params['date'])->format('Y-m-d');
        $params['user_id'] = auth()->id();
        $params['stock_type'] = 'INNER';
        $params['stock_left'] = $params['stock_total'];

        $stock->update([
            'date' => $params['date'] ?? $stock->date,
            'brand_id' => $params['brand_id'] ?? $stock->brand_id,
            'brand_type_id' => $params['brand_type_id'] ?? $stock->brand_type_id,
            'brand_size_id' => $params['brand_size_id'] ?? $stock->brand_size_id,
            'stock_total' => $params['stock_total'] ?? $stock->stock_total,
        ]);
        $title = Auth::user()->name . ' telah mengubah stok INNER ' ;
            $description = Auth::user()->name . ' telah mengubah stok INNER ' ;
            $log = new LogActivity();
            $log->user_id = Auth::user()->id;
            $log->source_id = $stock->id;
            $log->source_type = '\App\Stock';
            $log->title = $title;
            $log->description = $description;
            $log->save();
        return redirect()->route('frontend.inner.index')->with('success', 'Berhasil mengubah Jenis Brand!');

    }

    public function destroy($id)
    {
        $stock = Stock::where('id', $id)->first();
        $stock->delete();
        return json_encode([
            'status' => true,
            // 'stock' => $stock,
        ]);
    }

    public function datatables(Request $request)
    {
        // return $request->all();
        $limit = $request->input('length');
        $offset = $request->input('start');
        $draw = $request->input('draw');
        $stocks = Stock::where('stock_type', 'INNER')->get();

        $total = $stocks->count();
        $stocks->take($limit)->skip($offset);
        $output = [];

        $data =  [];
        foreach ($stocks as $key => $row) {
            $item["id"] = $row->id;
            $item["date"] = $row->date;
            $item["brand_id"] = $row->brand->brand_name;
            $item["brand_type_id"] = $row->BrandType->brand_type;
            $item["brand_size_id"] = $row->size->brand_size;
            $item["stock_total"] = $row->stock_total;

            $item['action'] = '<a href="' . route('frontend.inner.edit', $row->id) . '" class="btn btn-sm btn-info mr-2" data-toggle="edit"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a href="#"  data-id="'.$row['id'].'" rel="noreferrer"class="btn btn-delete btn-sm btn-danger" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
            $data[] = $item;
        }
        $output['data'] = $data;
        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered'] = $total;
        return json_encode($output);
    }
}
