<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Vendor;
use App\Models\Warehouse;

// class AuthController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         // Check in Admin table
//         $admin = Admin::where('email', $request->email)->first();
//         if ($admin && Hash::check($request->password, $admin->password)) {
//             echo "admin";
//             Auth::login($admin);
//             return redirect()->route('admin.dashboard');
//         }

//         // Check in Companies table
//         $company = Company::where('email', $request->email)->first();
//         if ($company && Hash::check($request->password, $company->password)) {
//             Auth::login($company);
//             return redirect()->route('company.dashboard');
//         }

//         // Check in Branches table
//         $branch = Branch::where('email', $request->email)->first();
//         if ($branch && Hash::check($request->password, $branch->password)) {
//             Auth::login($branch);
//             return redirect()->route('branch.dashboard');
//         }

//         // Check in Vendors table
//         $vendor = Vendor::where('email', $request->email)->first();
//         if ($vendor && Hash::check($request->password, $vendor->password)) {
//             Auth::login($vendor);
//             return redirect()->route('vendor.dashboard');
//         }

//         // Check in Warehouses table
//         $warehouse = Warehouse::where('email', $request->email)->first();
//         if ($warehouse && Hash::check($request->password, $warehouse->password)) {
//             Auth::login($warehouse);
//             return redirect()->route('warehouse.dashboard');
//         }

//         return back()->withErrors(['email' => 'Invalid credentials']);
//     }

//     public function logout()
//     {
//         Auth::logout();
//         return redirect()->route('login');
//     }

//     // Dummy dashboard methods for different roles
//     public function adminDashboard() {
//         echo "admin dashboard";
//         return view('admin.dashboard');
//     }

//     public function companyDashboard() {
//         return view('company.dashboard');
//     }

//     public function branchDashboard() {
//         return view('branch.dashboard');
//     }

//     public function vendorDashboard() {
//         return view('vendor.dashboard');
//     }

//     public function warehouseDashboard() {
//         return view('warehouse.dashboard');
//     }
// }

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure you have a login blade file
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect users based on their role
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->isCompany()) {
                return redirect()->route('company.dashboard');
            } elseif ($user->isBranch()) {
                return redirect()->route('branch.dashboard');
            } elseif ($user->isVendor()) {
                return redirect()->route('vendor.dashboard');
            } elseif ($user->isWarehouse()) {
                return redirect()->route('warehouse.dashboard');
            }

            return redirect('/'); // Fallback if no role is found
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

