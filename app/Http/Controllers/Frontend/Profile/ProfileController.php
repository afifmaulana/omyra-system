<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('pages.frontend.profile.profile', [
            'user' => $user
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
