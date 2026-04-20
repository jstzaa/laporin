<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        // Menyimpan input validasi
        $username = $request->username;
        $password = $request->password;

        // Login dengan guard admin
        if (Auth::guard('admin')->attempt([
            'username' => $username,
            'password' => $password
        ])){
            $request->session()->regenerate();
            return redirect()->route('show.home.admin');
        }

        // Login dengan guard siswa
        if (Auth::guard('siswa')->attempt([
            'nis' => $username,
            'password' => $password
        ])){
            $request->session()->regenerate();
            return redirect()->route('show.home.siswa');
        }

        // Jika login gagal, kembalikan dengan error
        return back()->withErrors([
            'login' => 'Username atau password salah'
        ])->withInput();
    }

    // Fungsi logout
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        Auth::guard('siswa')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
