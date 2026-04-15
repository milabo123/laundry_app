<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // function buat nampilin halaman login
    public function index()
    {
        return view('auth.login');
    }

    // function bakal login
    public function login(Request $request)
{
    // validasi input
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // if buat login
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // buat ngecek "id_level" nya
        $role = Auth::user()->id_level; 
        
        if ($role == 1) {
            return redirect()->intended('/admin/dashboard');
        } elseif ($role == 2) {
            return redirect()->intended('/pimpinan/dashboard');
        } elseif ($role == 3) {
            return redirect()->intended('/operator/dashboard');
        }
    }

    // error message kalo misal loginnye gagal
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}
    // function bakal logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

