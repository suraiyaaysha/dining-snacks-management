<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Snack;

class SnackController extends Controller
{
    public function index()
    {
        $snacks = Snack::all();
        return view('admin.snack.index', compact('snacks'));
    }

    public function create()
    {
        return view('admin.snack.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'shift' => 'required|string',
        ]);

        Snack::create($request->all());

        return redirect()->route('admin.snack.index')->with('success', 'Snack added successfully.');
    }

    public function edit(Snack $snack)
    {
        return view('snacks.edit', compact('snack'));
    }

    public function update(Request $request, Snack $snack)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'shift' => 'required|string',
        ]);

        $snack->update($request->all());

        return redirect()->route('admin.snack.index')->with('success', 'Snack updated successfully.');
    }

    public function destroy(Snack $snack)
    {
        $snack->delete();
        return redirect()->route('admin.snack.index')->with('success', 'Snack deleted successfully.');
    }
}
