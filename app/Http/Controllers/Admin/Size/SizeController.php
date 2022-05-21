<?php

namespace App\Http\Controllers\Admin\Size;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.size.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'brand_size' => 'required|string',
        ]);

        $params = $request->all();
        Size::create($params);
        return redirect()->route('admin.size.index')->with('success', 'Berhasil menambahkan Ukuran baru!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::where('id', $id)->first();
        return view('pages.admin.size.edit', [
            'size' => $size
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
            'brand_size' => 'required|string',
        ]);

        $size = Size::where('id', $id)->first();
        $params = $request->all();

        $size->update([
            'brand_size' => $params['brand_size'] ?? $size->brand_size,
        ]);
        return redirect()->route('admin.size.index')->with('success', 'Berhasil mengubah Ukuran!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::where('id', $id)->first();
        // $size->update([
        //     'email' => $size->email.'_deleted'
        // ]);
        $size->delete();
        return json_encode([
            'status' => true
        ]);
        //return redirect()->route('admin.size.index')->with('success', 'Successfully Deleted Data!');
    }

    public function datatables(Request $request)
    {
        // return $request->all();
        $limit = $request->input('length');
        $offset = $request->input('start');
        $draw = $request->input('draw');
        $sizes = Size::select('*');

        $total = $sizes->count();
        $sizes->take($limit)->skip($offset);
        $output = [];

        $data =  [];
        foreach ($sizes->get() as $key => $row) {
            $item["id"] = $row->id;
            $item["brand_size"] = $row->brand_size;

            $item['action'] = '<a href="' . route('admin.size.edit', $row->id) . '" class="btn btn-sm btn-info mr-2" data-toggle="edit"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a href="#"  data-id="'.$row['id'].'" rel="noreferrer"class="btn btn-delete btn-sm btn-danger" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
            $data[] = $item;
        }
        $output['data'] = $data;
        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered'] = $total;
        return json_encode($output);
    }

}
