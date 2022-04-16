<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
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
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'role' => 'required|in:0,1,2'
        ]);

        $params = $request->all();
        unset($params['_token']);
        unset($params['password']);
        $params['password'] = app('hash')->make($request->password);
        User::create($params);
        return redirect()->route('admin.user.index')->with('success', 'Berhasil menambahkan User baru!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('pages.admin.user.edit', [
            'user' => $user
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
            'email' => 'required|email|unique:users,email,'.$id,
            'name' => 'required|string',
            'role' => 'required'
        ]);

        $user = User::where('id', $id)->first();
        $params = $request->all();
        unset($params['_token']);
        unset($params['password']);
        $params['password'] = app('hash')->make($request->password);


        $user->update([
            'name' => $params['name'] ?? $user->name,
            'email' => $params['email'] ?? $user->email,
            'role' => $params['role'] ?? $user->role,
            'password' => $params['password'] ?? $user->password,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'Berhasil mengubah User!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        // $user->update([
        //     'email' => $user->email.'_deleted'
        // ]);
        $user->delete();
        return json_encode([
            'status' => true
        ]);
        //return redirect()->route('admin.user.index')->with('success', 'Successfully Deleted Data!');
    }

    public function datatables(Request $request)
    {
        // return $request->all();
        $limit = $request->input('length');
        $offset = $request->input('start');
        $draw = $request->input('draw');
        $users = User::select('*');

        $users = $this->filterDatatables($request, $users);

        $total = $users->count();
        $users->take($limit)->skip($offset);
        $output = [];

        $data =  [];
        foreach ($users->get() as $key => $row) {
            $item["id"] = $row->id;
            $item["name"] = $row->name;
            $item["email"] = $row->email;
            $item["role"] = $this->stylingTypeUser($row->role);

            $item['action'] = '<a href="' . route('admin.user.edit', $row->id) . '" class="btn btn-sm btn-info mr-2" data-toggle="edit"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a href="#"  data-id="'.$row['id'].'" rel="noreferrer"class="btn btn-delete btn-sm btn-danger" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
            $data[] = $item;
        }
        $output['data'] = $data;
        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered'] = $total;
        return json_encode($output);
    }

    private function filterDatatables($request, $users)
    {
        if ($request->id) {
            $users->where('users.id', 'like', '%' . $request->id . '%');
        }
        if ($request->name) {
            $users->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $users->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->role) {
            $users->where('role', 'like', '%' . $request->role . '%');
        }
        return $users;
    }

    private function stylingTypeUser($users)
    {
        if ($users == '0') {
                return '<span class="Admin text-capitalize" style="background-color:#d7ffc4;font-size:12px;font-weight:bold;color:#05ab05;padding: 5px 25px 5px 25px; border-radius: 20px;">'. 'Admin' .'</span>';
            }elseif($users == '1'){
                return '<span class="Mandor text-capitalize" style="background-color:#fff396;font-size:12px;font-weight:bold;color:#ffa600;padding: 5px 25px 5px 25px; border-radius: 20px;">'. 'Mandor' .'</span>';
            }elseif($users == '2'){
                return '<span class="Staff Gudang text-capitalize" style="background-color:#f4d1ff;font-size:12px;font-weight:bold;color:#6b039c;padding: 5px 25px 5px 25px; border-radius: 20px;">'. 'Staff Gudang' .'</span>';
            }
        }

}
