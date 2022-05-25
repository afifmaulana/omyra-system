<?php

namespace App\Http\Controllers\Frontend\Briquette;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandType;
use App\Models\Finished;
use App\Models\LogActivity;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinishedController extends Controller
{
    public function index()
    {
        return view('pages.frontend.briquette.finished.index');
    }

    public function create()
    {
        $brands = Brand::all();
        $BrandTypes = BrandType::all();
        $sizes = Size::all();
        return view('pages.frontend.briquette.finished.create',[
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
            'total' => 'required',
        ]);
        DB::beginTransaction();
        try{
            $params['date'] = Carbon::parse($params['date'])->format('Y-m-d');
            $params['user_id'] = auth()->id();
            $params['stock_left'] = $params['total'];
            $finished = Finished::create($params);

            $title = Auth::user()->name . ' telah menambahkan data barang jadi sebanyak ' . $finished->total;
            $description = Auth::user()->name . ' telah menambahkan data barang jadi sebanyak ' . $finished->total;
            $log = new LogActivity();
            $log->user_id = Auth::user()->id;
            $log->source_id = $finished->id;
            $log->source_type = '\App\Finished';
            $log->title = $title;
            $log->description = $description;
            $log->save();

            DB::commit();
            return redirect()->route('frontend.finished.index')->with('success', 'Berhasil menambahkan data Plastik');
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
        $finished = Finished::select('*');

        $total = $finished->count();
        $finished->take($limit)->skip($offset);
        $output = [];

        $data =  [];
        foreach ($finished->get() as $key => $row) {
            $item["id"] = $row->id;
            $item["date"] = $row->date;
            $item["brand_id"] = $row->brand->brand_name;
            $item["brand_type_id"] = $row->BrandType->brand_type;
            $item["brand_size_id"] = $row->size->brand_size;
            $item["total"] = $row->total;

            $item['action'] = '<a href="' . route('frontend.finished.edit', $row->id) . '" class="btn btn-sm btn-info mr-2" data-toggle="edit"><i class="fa fa-edit"></i></a>';
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
        $finished = Finished::where('id', $id)->first();
        $brand = Brand::all();
        $sizes = Size::all();
        $brandTypes = BrandType::all();
        // dd($brandTypes);
        return view('pages.frontend.briquette.finished.edit', [
            'finished' => $finished,
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
            'total' => 'required',
        ]);

        $finished = Finished::where('id', $id)->first();
        DB::beginTransaction();
        try {
            $title = $description = 'Barang Jadi dengan ID #' . $finished->id . ' telah diubah oleh ' . Auth::user()->name;
            $log = new LogActivity();
            $log->user_id = Auth::user()->id;
            $log->source_type = 'App\Finished';
            $log->source_id = $finished->id;
            $log->title = $title;
            $log->description = $description;
            $log->save();

            $finished->date = Carbon::parse($request->date)->format('Y-m-d');
            $finished->brand_id = $request->brand_id;
            $finished->brand_type_id = $request->brand_type_id;
            $finished->brand_size_id = $request->brand_size_id;
            $finished->total = $request->total;

            $finished->update();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        return redirect()->route('frontend.finished.index')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $finished = Finished::where('id', $id)->first();
        $finished->delete();
        return json_encode([
            'status' => true,
        ]);
    }
}
