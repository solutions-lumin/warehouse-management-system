<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::where('company_id', Auth::user()->company_id)->get();
        return view('admin.warehouses.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'contact' => 'required',
        ]);

        // Warehouse::create([
        //     'company_id' => Auth::user()->company_id,
        //     'name' => $request->name,
        //     'location' => $request->location,
        // ]);

        print_r( $request );
        if (Auth::check()) {
            Warehouse::create([
                'company_id' => Auth::user()->company_id,
                'name' => $request->name,
                'location' => $request->location,
            ]);
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }

        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
