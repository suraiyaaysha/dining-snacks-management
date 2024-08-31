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
        // $menuAssignments = MenuAssignment::all();

        $menuAssignments = MenuAssignment::with(['morningSnacks', 'afternoonSnacks', 'lunchItems'])->get();
        return view('admin.menu-assignment.index', compact('menuAssignments'));
    }

    public function create()
    {
        $morningSnacks = Snack::where('time', 'morning')->get();
        $afternoonSnacks = Snack::where('time', 'afternoon')->get();
        $lunches = Lunch::all();
        return view('admin.menu-assignment.create', compact('morningSnacks', 'afternoonSnacks', 'lunches'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'day_of_week' => 'required|string',
    //         'morning_snack_ids' => 'required|array',
    //         'morning_snack_ids.*' => 'exists:snacks,id',
    //         'afternoon_snack_ids' => 'required|array',
    //         'afternoon_snack_ids.*' => 'exists:snacks,id',
    //         'lunch_ids' => 'required|array',
    //         'lunch_ids.*' => 'exists:lunches,id',
    //     ]);

    //     $menuAssignment = new MenuAssignment([
    //         'day_of_week' => $request->day_of_week,
    //         'morning_snack_ids' => json_encode($request->morning_snack_ids),
    //         'afternoon_snack_ids' => json_encode($request->afternoon_snack_ids),
    //         'lunch_ids' => json_encode($request->lunch_ids),
    //     ]);
    //     $menuAssignment->save();

    //     return redirect()->route('admin.menu-assignment.index')->with('success', 'Menu assigned successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'morning_snack_ids' => 'required|array',
            'morning_snack_ids.*' => 'exists:snacks,id',
            'afternoon_snack_ids' => 'required|array',
            'afternoon_snack_ids.*' => 'exists:snacks,id',
            'lunch_ids' => 'required|array',
            'lunch_ids.*' => 'exists:lunches,id',
        ]);

        $menuAssignment = MenuAssignment::create([
            'day_of_week' => $request->day_of_week,
        ]);

        $menuAssignment->morningSnacks()->attach($request->morning_snack_ids, ['time' => 'morning']);
        $menuAssignment->afternoonSnacks()->attach($request->afternoon_snack_ids, ['time' => 'afternoon']);
        $menuAssignment->lunchItems()->attach($request->lunch_ids);

        return redirect()->route('admin.menu-assignment.index')->with('success', 'Menu assigned successfully.');
    }

    public function edit(MenuAssignment $menuAssignment)
    {
        $morningSnacks = Snack::where('time', 'morning')->get();
        $afternoonSnacks = Snack::where('time', 'afternoon')->get();
        $lunches = Lunch::all();
        $menuAssignment->morning_snack_ids = json_decode($menuAssignment->morning_snack_ids);
        $menuAssignment->afternoon_snack_ids = json_decode($menuAssignment->afternoon_snack_ids);
        $menuAssignment->lunch_ids = json_decode($menuAssignment->lunch_ids);
        return view('admin.menu-assignment.edit', compact('menuAssignment', 'morningSnacks', 'afternoonSnacks', 'lunches'));
    }

    public function update(Request $request, MenuAssignment $menuAssignment)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'morning_snack_ids' => 'required|array',
            'morning_snack_ids.*' => 'exists:snacks,id',
            'afternoon_snack_ids' => 'required|array',
            'afternoon_snack_ids.*' => 'exists:snacks,id',
            'lunch_ids' => 'required|array',
            'lunch_ids.*' => 'exists:lunches,id',
        ]);

        $menuAssignment->update([
            'day_of_week' => $request->day_of_week,
            'morning_snack_ids' => json_encode($request->morning_snack_ids),
            'afternoon_snack_ids' => json_encode($request->afternoon_snack_ids),
            'lunch_ids' => json_encode($request->lunch_ids),
        ]);

        return redirect()->route('admin.menu-assignment.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(MenuAssignment $menuAssignment)
    {
        $menuAssignment->delete();
        return redirect()->route('admin.menu-assignment.index')->with('success', 'Menu assignment deleted successfully.');
    }
}
