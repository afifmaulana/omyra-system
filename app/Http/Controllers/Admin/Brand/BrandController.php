<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.brand.create');
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
            'brand_name' => 'required|string',
        ]);

        $params = $request->all();
        Brand::create($params);
        return redirect()->route('admin.brand.index')->with('success', 'Berhasil menambahkan Brand baru!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('pages.admin.brand.edit', [
            'brand' => $brand
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
            'brand_name' => 'required|string',
        ]);

        $brand = Brand::where('id', $id)->first();
        $params = $request->all();

        $brand->update([
            'brand_name' => $params['brand_name'] ?? $brand->brand_name,
        ]);
        return redirect()->route('admin.brand.index')->with('success', 'Berhasil mengubah Brand!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->first();
        // $brand->update([
        //     'email' => $brand->email.'_deleted'
        // ]);
        $brand->delete();
        return json_encode([
            'status' => true
        ]);
        //return redirect()->route('admin.brand.index')->with('success', 'Successfully Deleted Data!');
    }

    public function datatables(Request $request)
    {
        // return $request->all();
        $limit = $request->input('length');
        $offset = $request->input('start');
        $draw = $request->input('draw');
        $brands = Brand::select('*');


        $total = $brands->count();
        $brands->take($limit)->skip($offset);
        $output = [];

        $data =  [];
        foreach ($brands->get() as $key => $row) {
            $item["id"] = $row->id;
            $item["brand_name"] = $row->brand_name;

            $item['action'] = '<a href="' . route('admin.brand.edit', $row->id) . '" class="btn btn-sm btn-info mr-2" data-toggle="edit"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a href="#"  data-id="' . $row['id'] . '" rel="noreferrer"class="btn btn-delete btn-sm btn-danger" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
            $data[] = $item;
        }
        $output['data'] = $data;
        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered'] = $total;
        return json_encode($output);
    }
}
