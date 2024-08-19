<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {

        $credentials =$request->validate ([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        
    if (auth()->attempt($credentials)) {

        // buat ulang session login
        $request->session()->regenerate();

        // Ambil peran pengguna
        $userRole = auth()->user()->role->id;

        if ($userRole === 1) {
            // jika user admin
            return redirect()->intended('/admin');
        } elseif ($userRole === 2) {
            // jika user mekanik
            return redirect()->intended('/mekanik');
        } else {
            // Jika User biasa
            return redirect()->intended('/HalamanUser');
        }
    }

        return back()->with('error', 'Email atau password salah');

        // if (auth()->attempt($credentials)) {

        //     // buat ulang session login
        //     $request->session()->regenerate();

        //     if (auth()->user()->role_id === 1) {
        //         // jika user admin
        //         return redirect()->intended('/admin');
        //     } else if (auth()->user()->role_id === 2) {
        //         // jika user mekanik
        //         return redirect()->intended('/mekanik');
        //     }else {
        //         // Jika User biasa
        //         return redirect()->intended('/user');
        //     }
        // }

        // // Jika email nya atau pass salah 
        // // Maka dikirimkan session error 
        // return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
