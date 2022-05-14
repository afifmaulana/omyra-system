<?php

namespace App\Http\Controllers\Auth\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginFrontendController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.frontend.login');
    }

    public function login(Request $request)
    {
        $rules =  [
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'min' => ':attribute minimal :min',
        ];

        $this->validate($request, $rules, $message);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // if (Auth::attempt($credential, $request->remember)) {
        //     return response()->json([
		// 		'status' => true,
		// 		'message' => 'berhasil login'
		// 	]);
		// 	//redirect()->intended(route('dashboard.index'));
        // }

        if (Auth::attempt($credential, true)){
            $user = Auth::user();
            if (!$user->deleted_at) {
                if ($user->role == 0){
                    return redirect()->intended(route('admin.dashboard.index'));
                }else if ($user->role == 1){
                    return redirect()->intended(route('admin.brand-type.index'));
                }else{
                    return redirect()->intended(route('admin.brand.index'));
                }
            }else{
                $errors = new MessageBag(['email' => 'your account has been deleted']);
                return redirect()->back()->withInput($request->only('email'))
                ->withErrors($errors);
            }

        }

        $errors = new MessageBag(['email' => 'enter the correct email and password']);
                return redirect()->back()->withInput($request->only('email'))
                ->withErrors($errors);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.frontend');
    }
}
