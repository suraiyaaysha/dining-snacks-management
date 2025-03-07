<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lunch;

class LunchController extends Controller
{
    public function index()
    {
        $lunches = Lunch::all();
        return view('admin.lunch.index', compact('lunches'));
    }

    public function create()
    {
        return view('admin.lunch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'quantity_per_person' => 'required|numeric',
        ]);

        Lunch::create($request->only(['item', 'quantity_per_person']));

        return redirect()->route('admin.lunch.index')->with('success', 'Lunch item added successfully.');
    }

    public function edit(Lunch $lunch)
    {
        return view('admin.lunch.edit', compact('lunch'));
    }

    public function update(Request $request, Lunch $lunch)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'quantity_per_person' => 'required|numeric',
        ]);

        $lunch->update($request->only(['item', 'quantity_per_person']));

        return redirect()->route('admin.lunch.index')->with('success', 'Lunch item updated successfully.');
    }

    public function destroy(Lunch $lunch)
    {
        $lunch->delete();
        return redirect()->route('admin.lunch.index')->with('success', 'Lunch item deleted successfully.');
    }
}
