<?php

namespace App\Http\Controllers;

use App\Models\Manpower;
use Illuminate\Http\Request;

class ManpowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manpower = Manpower::orderBy('date', 'asc')->get();
        return view('admin.manpower.index', compact('manpower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manpower.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'shift_a' => 'required|integer',
            'shift_general' => 'required|integer',
            'shift_b' => 'required|integer',
            'shift_c' => 'required|integer',
            'date' => 'required|date',
        ]);

        $total = $request->shift_a + $request->shift_general + $request->shift_b + $request->shift_c;

        Manpower::create([
            'shift_a' => $request->shift_a,
            'shift_general' => $request->shift_general,
            'shift_b' => $request->shift_b,
            'shift_c' => $request->shift_c,
            'total' => $total,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.manpower.index')->with('success', 'Manpower added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manpower $manpower)
    {
        return view('admin.manpower.edit', compact('manpower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manpower $manpower)
    {
        $request->validate([
            'shift_a' => 'required|integer',
            'shift_general' => 'required|integer',
            'shift_b' => 'required|integer',
            'shift_c' => 'required|integer',
            'date' => 'required|date',
        ]);

        $total = $request->shift_a + $request->shift_general + $request->shift_b + $request->shift_c;

        $manpower->update([
            'shift_a' => $request->shift_a,
            'shift_general' => $request->shift_general,
            'shift_b' => $request->shift_b,
            'shift_c' => $request->shift_c,
            'total' => $total,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.manpower.index')->with('success', 'Manpower updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manpower $manpower)
    {
        $manpower->delete();
        return redirect()->route('admin.manpower.index')->with('success', 'Manpower deleted successfully.');
    }

    public function showManpowerQuantities()
    {
        // Retrieve all manpower records ordered by date
        $manpower = Manpower::orderBy('date', 'asc')->get();

        // Process each manpower record to calculate the quantities
        $quantities = $manpower->map(function ($mp) {
            return [
                'date' => $mp->date,
                'snacksMorning' => $mp->shift_a + $mp->shift_general,
                'snacksAfternoon' => $mp->shift_b + $mp->shift_c,
                'lunch' => $mp->shift_a + $mp->shift_general + $mp->shift_b,
            ];
        });

        // Pass the calculated quantities to the view
        return view('admin.manpower.quantities', compact('quantities'));
    }

}
