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
        try {
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
        $brandTypes = BrandType::all();
        // dd($brandTypes);
        return view('pages.frontend.stock.inner.edit', [
            'stock' => $stock,
            'brand' => $brand,
            'sizes' => $sizes,
            'brandTypes' => $brandTypes,
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
        $this->validate($request, [
            'date' => 'required',
            'brand_id' => 'required',
            'brand_type_id' => 'required',
            'brand_size_id' => 'required',
            'stock_total' => 'required',
        ]);

        $stock = Stock::where('id', $id)->first();
        DB::beginTransaction();
        try {
            $title = $description = 'Stock Inner dengan ID #' . $stock->id . ' telah diubah oleh Mas ' . Auth::user()->name;
            $log = new LogActivity();
            $log->user_id = Auth::user()->id;
            $log->source_type = 'App\Stock';
            $log->source_id = $stock->id;
            $log->title = $title;
            $log->description = $description;
            $log->save();

            $stock->date = Carbon::parse($request->date)->format('Y-m-d');
            $stock->brand_id = $request->brand_id;
            $stock->brand_type_id = $request->brand_type_id;
            $stock->brand_size_id = $request->brand_size_id;
            $stock->stock_total = $request->stock_total;

            $stock->update();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        return redirect()->route('frontend.inner.index')->with('success', 'Berhasil mengubah data');
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

        $stocks = $this->filterDatatables($request, $stocks);

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
            $item['action'] .= '<a href="#"  data-id="' . $row['id'] . '" rel="noreferrer"class="btn btn-delete btn-sm btn-danger" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
            $data[] = $item;
        }
        $output['data'] = $data;
        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered'] = $total;
        return json_encode($output);
    }

    private function filterDatatables($request, $stocks)
    {
        if ($request->filter_date) {
            $date = explode(' to ', $request->filter_date);
            if (count($date) < 2) {
                $stocks->where(DB::raw('str_to_date(date, "%d-%m-%Y")'), $date);
            }else{
                $start_date = $date[0];
                $end_date = $date[1];
                $stocks->where(DB::raw('str_to_date(date, "%d-%m-%Y")'), '>=', $start_date)
                ->where(DB::raw('str_to_date(date, "%d-%m-%Y")'), '<=', $end_date);
            }
        }
        if ($request->input('stock') != null) {
            $columnIndex = $request->input('stock')[0]['column']; // Column index
            $columnName = $request->input('columns')[$columnIndex]['data']; // Column name
            $stocks->orderBy($columnName, $request->input('stock')[0]['dir']);
        }

        if ($request->id) {
            $stocks->where('stocks.id', 'like', '%' . $request->id . '%');
        }
        if ($request->date) {
            $stocks->where('date', 'like', '%' . $request->date . '%');
        }
        if ($request->brand_id) {
            $stocks->where('brand_id', 'like', '%' . $request->brand_id . '%');
        }
        if ($request->brand_type_id) {
            $stocks->where('brand_type_id', 'like', '%' . $request->brand_type_id . '%');
        }
        if ($request->brand_size_id) {
            $stocks->where('brand_size_id', 'like', '%' . $request->brand_size_id . '%');
        }
        if ($request->stock_total) {
            $stocks->where('stock_total', 'like', '%' . $request->stock_total . '%');
        }
        return $stocks;
    }
}
