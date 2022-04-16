<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $data = User::get()->first();
        return view('pages.admin.profile.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required',
			'email' => 'required',
			'password' => 'required',
			'role' => 'required|in:0,1,2'
        ];

        $message = [
            'required'  => ':attribute tidak  boleh kosong',
        ];

        $this->validate($request, $rules, $message);

        $user = User::get()->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->update();
        // Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Berhasil mengubah profil!');
    }
}
