<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function proseslogin(Request $request) {
        if (Auth::guard('karyawan')->attempt(['nik'=> $request->nik, 'password'=> $request->password])) {
            return redirect ('/dashboard');
        }else if (Auth::guard('user')->attempt(['nik'=> $request->nik, 'password'=> $request->password])){
            return redirect('/dashboard/admin');
        }else {
            return redirect('/')->with(['warning' => 'NIK / Password salah!']);
        }
    }

    public function proseslogout() {
        if (Auth::guard('karyawan')->check() || Auth::guard('user')->check()) {
            Auth::guard('karyawan')->logout();
            Auth::guard('user')->logout();
            return redirect('/');
        }
    }
}
