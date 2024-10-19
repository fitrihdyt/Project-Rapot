<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'home'
        ]);
    }

    // form login
    public function login()
    {
        return view('auth.login');
    }
    // authentication
    public function authentication(Request $request, Auth $auth)
    {
        // validasi form input
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        
        // proses authentikasi
        $credential = $request->only('email', 'password');
        if ($auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect()->route('auth.home');
        }
        // jika proses authentikasi gagal maka akan di redirect ke halaman login
        return back()->withErrors([
            'email' => 'Email atau password tidak ditemukan',
        ])->onlyInput('email');

    }
    // dashboard
    public function home()
    {
        if(Auth::check())
        {
            return view('auth.home');
        }

        return redirect()->route('auth.login');
    }
    // logout
    public function logout(Request $request, Auth $auth)
    {
        $auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

}