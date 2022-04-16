<?php

namespace App\Http\Controllers\Admin\BrandType;

use App\Http\Controllers\Controller;
use App\Models\BrandType;
use Illuminate\Http\Request;

class BrandTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.brand-type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.brand-type.create');
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
            'brand_type' => 'required|string',
        ]);

        $params = $request->all();
        BrandType::create($params);
        return redirect()->route('admin.brand-type.index')->with('success', 'Berhasil menambahkan Jenis Brand baru!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandType = BrandType::where('id', $id)->first();
        return view('pages.admin.brand-type.edit', [
            'brandType' => $brandType
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
            'brand_type' => 'required|string',
        ]);

        $brandType = BrandType::where('id', $id)->first();
        $params = $request->all();

        $brandType->update([
            'brand_type' => $params['brand_type'] ?? $brandType->brand_type,
        ]);
        return redirect()->route('admin.brand-type.index')->with('success', 'Berhasil mengubah Jenis Brand!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandType = BrandType::where('id', $id)->first();
        // $brandType->update([
        //     'email' => $brandType->email.'_deleted'
        // ]);
        $brandType->delete();
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
        $brandTypes = BrandType::select('*');

        $brandTypes = $this->filterDatatables($request, $brandTypes);

        $total = $brandTypes->count();
        $brandTypes->take($limit)->skip($offset);
        $output = [];

        $data =  [];
        foreach ($brandTypes->get() as $key => $row) {
            $item["id"] = $row->id;
            $item["brand_type"] = $row->brand_type;

            $item['action'] = '<a href="' . route('admin.brand-type.edit', $row->id) . '" class="btn btn-sm btn-info mr-2" data-toggle="edit"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a href="#"  data-id="'.$row['id'].'" rel="noreferrer"class="btn btn-delete btn-sm btn-danger" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
            $data[] = $item;
        }
        $output['data'] = $data;
        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered'] = $total;
        return json_encode($output);
    }

    private function filterDatatables($request, $brandTypes)
    {
        if ($request->id) {
            $brandTypes->where('brands.id', 'like', '%' . $request->id . '%');
        }
        if ($request->brand_type) {
            $brandTypes->where('brand_type', 'like', '%' . $request->brand_type . '%');
        }

        return $brandTypes;
    }

}
