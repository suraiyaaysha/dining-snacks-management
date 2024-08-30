<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Snack;

class SnackController extends Controller
{
    public function index()
    {
        $snacks = Snack::all();
        return view('admin.snacks.index', compact('snacks'));
    }

    public function create()
    {
        return view('admin.snacks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'time' => 'required|in:morning,afternoon',
            'quantity_per_person' => 'required|integer',
        ]);

        Snack::create($request->only(['item', 'time', 'quantity_per_person']));

        return redirect()->route('admin.snacks.index')->with('success', 'Snack added successfully.');
    }

    public function edit(Snack $snack)
    {
        return view('admin.snacks.edit', compact('snack'));
    }

    public function update(Request $request, Snack $snack)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'time' => 'required|in:morning,afternoon',
            'quantity_per_person' => 'required|integer',
        ]);

        $snack->update($request->only(['item', 'time', 'quantity_per_person']));

        return redirect()->route('admin.snacks.index')->with('success', 'Snack updated successfully.');
    }

    public function destroy(Snack $snack)
    {
        $snack->delete();
        return redirect()->route('admin.snacks.index')->with('success', 'Snack deleted successfully.');
    }
}
