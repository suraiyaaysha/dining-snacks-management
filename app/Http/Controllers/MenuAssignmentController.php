<?php

namespace App\Http\Controllers;

use App\Models\Lunch;
use App\Models\MenuAssignment;
use App\Models\Snack;
use Illuminate\Http\Request;

class MenuAssignmentController extends Controller
{
    public function index()
    {
        $snacks = Snack::all();
        $lunches = Lunch::all();

        return view('admin.menu-assignment.index', compact('snacks', 'lunches'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day_of_week'=>'required|string',
            'snack_ids'=>'required|array',
            'lunch_ids'=>'required|array',
        ]);

        foreach ($validatedData['snack_ids'] as $snack_id) {
            foreach ($validatedData['lunch_ids'] as $lunch_id) {
                MenuAssignment::create([
                    'day_of_week' => $validatedData['day_of_week'],
                    'snack_id' => $snack_id,
                    'lunch_id' => $lunch_id,
                ]);
            }
        }

        return redirect()->route('admin.menu-assignment.index')
        ->with('success', 'Menu assigned successfully.');
    }
}
