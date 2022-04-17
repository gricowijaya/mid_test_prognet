<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index() {
        return view('auth.admin.login');
    }

    public function login(Request $request) {

        // dd($request);

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($credentials)) {            
            $request->session()->regenerate();

            return redirect()->route('admins.daftar-keluhan');
        }

        return back()->withErrors([
            'email' => 'User the right admin email!',
        ]);
    }

    public function logout(Request $request) {
        Auth::guard('admins')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard() {
        return view('layouts.admin.index');
    }
}
