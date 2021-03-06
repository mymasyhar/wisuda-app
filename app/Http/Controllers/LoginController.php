<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('kode', 'password'))) {
            return redirect('dashboard');
        }

        return redirect('login');
    }

    public function dashboard()
    {
        # code...
        return view('general.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}
