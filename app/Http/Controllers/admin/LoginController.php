<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except([
            'logout'
        ]);
    }
    function loginForm()
    {
        Auth::guard('admin')->logout();
        return view('admin.login');
    }

    function authenticate(Request $request)
    {
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        if(Auth::guard('admin')->attempt($credentials))
        {
            return redirect()->route('admin.dashboard')->withSuccess('Admin login successfully !');
        }
        return back()->withErrors(['email' => 'Your provided credentials do not match in our records.'])->onlyInput('email');
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->withSuccess('You have logged out successfully! !');
    }
}
