<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show Admin Login Form
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    // Handle Admin Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    // Admin Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Logout Admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
