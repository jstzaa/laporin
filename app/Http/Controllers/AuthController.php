<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Route tampilan login form
    public function showLogin(){
        return view('login');
    }

    // Fungsi login
    public function login(Request $request){
        
        if(Auth::guard('admin')->attempt([
            'username' => 'required',
            'password' => 'required|min:8'
        ])){
            $request->session()->regenerate();
            return redirect()->route('show.home.admin');
        }
        if(Auth::guard('siswa')->attempt([
            'nis' => 'required',
            'password' => 'required|min:8'
        ])){
            $request->session()->regenerate();
            return redirect()->route('show.home.siswa');
        }
        return back()->withErrors([
            'login' => 'Username atau password salah'
        ])->withInput();
    }

    // Fungsi logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
