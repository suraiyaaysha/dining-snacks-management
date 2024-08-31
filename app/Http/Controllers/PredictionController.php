<?php

namespace App\Http\Controllers;

use App\Models\Lunch;
use App\Models\Snack;
use App\Models\Manpower;
use App\Models\MenuAssignment;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function predictSnacks()
    {
        // Calculate the average manpower for morning and afternoon shifts
        $averageManpowerMorning = Manpower::avg('shift_a') + Manpower::avg('shift_general');
        $averageManpowerAfternoon = Manpower::avg('shift_b') + Manpower::avg('shift_c');

        // Calculate predicted snacks quantities based on average manpower
        $predictedSnacksMorning = $averageManpowerMorning * Snack::where('time', 'morning')->sum('quantity_per_person');
        $predictedSnacksAfternoon = $averageManpowerAfternoon * Snack::where('time', 'afternoon')->sum('quantity_per_person');

        // Return the view with the calculated predictions
        return view('admin.predictions.snacks', compact('predictedSnacksMorning', 'predictedSnacksAfternoon'));
    }

    public function predictLunch()
    {
        // Calculate the average manpower for lunch shifts
        $averageManpower = Manpower::avg('shift_a') + Manpower::avg('shift_general') + Manpower::avg('shift_b');

        // Calculate predicted lunch quantities based on average manpower
        $predictedLunch = $averageManpower * Lunch::sum('quantity_per_person');

        // Return the view with the calculated prediction
        return view('admin.predictions.lunch', compact('predictedLunch'));
    }
}

