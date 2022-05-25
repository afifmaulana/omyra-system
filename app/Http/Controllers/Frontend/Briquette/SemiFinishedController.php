<?php

namespace App\Http\Controllers\Frontend\Briquette;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandType;
use App\Models\LogActivity;
use App\Models\SemiFinished;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        // dd($request->all());
        $params = $this->validate($request, [
            'date' => 'required',
            'oven_date' => 'required',
            'brand_id' => 'required',
            'brand_type_id' => 'required',
            'brand_size_id' => 'required',
            'total' => 'required',
        ]);
        DB::beginTransaction();
        try{
            $params['date'] = Carbon::parse($params['date'])->format('Y-m-d');
            $params['oven_date'] = Carbon::parse($params['date'])->format('Y-m-d');
            $params['user_id'] = auth()->id();
            $params['stock_left'] = $params['total'];
            $semiFinished = SemiFinished::create($params);

            $title = Auth::user()->name . ' telah menambahkan data barang 1/2 jadi sebanyak ' . $semiFinished->total;
            $description = Auth::user()->name . ' telah menambahkan data barang 1/2 jadi sebanyak ' . $semiFinished->total;
            $log = new LogActivity();
            $log->user_id = Auth::user()->id;
            $log->source_id = $semiFinished->id;
            $log->source_type = '\App\SemiFinished';
            $log->title = $title;
            $log->description = $description;
            $log->save();

            DB::commit();
            return redirect()->route('frontend.semi-finished.index')->with('success', 'Berhasil menambahkan data Plastik');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            // return redirect()->back
        }

    }

    public function datatables(Request $request)
    {
        // return $request->all();
        $limit = $request->input('length');
        $offset = $request->input('start');
        $draw = $request->input('draw');
        $semiFinished = SemiFinished::select('*');

        $total = $semiFinished->count();
        $semiFinished->take($limit)->skip($offset);
        $output = [];

        $data =  [];
        foreach ($semiFinished->get() as $key => $row) {
            $item["id"] = $row->id;
            $item["date"] = $row->date;
            $item["oven_date"] = $row->oven_date;
            $item["brand_id"] = $row->brand->brand_name;
            $item["brand_type_id"] = $row->BrandType->brand_type;
            $item["brand_size_id"] = $row->size->brand_size;
            $item["total"] = $row->total;

            $item['action'] = '<a href="' . route('frontend.semi-finished.edit', $row->id) . '" class="btn btn-sm btn-info mr-2" data-toggle="edit"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a href="#"  data-id="'.$row['id'].'" rel="noreferrer"class="btn btn-delete btn-sm btn-danger" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
            $data[] = $item;
        }
        $output['data'] = $data;
        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered'] = $total;
        return json_encode($output);
    }

    public function edit($id)
    {
        $semiFinished = SemiFinished::where('id', $id)->first();
        $brand = Brand::all();
        $sizes = Size::all();
        $brandTypes = BrandType::all();
        // dd($brandTypes);
        return view('pages.frontend.briquette.semi-finished.edit', [
            'semiFinished' => $semiFinished,
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
            'oven_date' => 'required',
            'brand_id' => 'required',
            'brand_type_id' => 'required',
            'brand_size_id' => 'required',
            'total' => 'required',
        ]);

        $semiFinished = SemiFinished::where('id', $id)->first();
        DB::beginTransaction();
        try {
            $title = $description = 'Barang 1/2 Jadi dengan ID #' . $semiFinished->id . ' telah diubah oleh Ibu ' . Auth::user()->name;
            $log = new LogActivity();
            $log->user_id = Auth::user()->id;
            $log->source_type = 'App\SemiFinished';
            $log->source_id = $semiFinished->id;
            $log->title = $title;
            $log->description = $description;
            $log->save();

            $semiFinished->date = Carbon::parse($request->date)->format('Y-m-d');
            $semiFinished->oven_date = Carbon::parse($request->oven_date)->format('Y-m-d');
            $semiFinished->brand_id = $request->brand_id;
            $semiFinished->brand_type_id = $request->brand_type_id;
            $semiFinished->brand_size_id = $request->brand_size_id;
            $semiFinished->total = $request->total;

            $semiFinished->update();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        return redirect()->route('frontend.semi-finished.index')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $semiFinished = SemiFinished::where('id', $id)->first();
        $semiFinished->delete();
        return json_encode([
            'status' => true,
        ]);
    }

}
