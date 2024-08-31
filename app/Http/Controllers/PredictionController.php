<?php

namespace App\Http\Controllers;

use App\Models\Manpower;
use App\Models\Snack;
use App\Models\Lunch;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function showPredictions()
    {
        // Calculate average manpower for today
        $manpower = Manpower::all();
        $averageMorning = $manpower->avg('shift_a') + $manpower->avg('shift_general');
        $averageAfternoon = $manpower->avg('shift_b') + $manpower->avg('shift_c');
        $averageLunch = $manpower->avg('shift_a') + $manpower->avg('shift_general') + $manpower->avg('shift_b');

        // Assume predictions for next day are same as today
        $nextDayMorning = $averageMorning;
        $nextDayAfternoon = $averageAfternoon;
        $nextDayLunch = $averageLunch;

        // Snack and lunch item predictions for today and next day
        $snackPredictionsToday = $this->calculateSnackPredictions($averageMorning, $averageAfternoon);
        $snackPredictionsNextDay = $this->calculateSnackPredictions($nextDayMorning, $nextDayAfternoon);

        $lunchPredictionsToday = $this->calculateLunchPredictions($averageLunch);
        $lunchPredictionsNextDay = $this->calculateLunchPredictions($nextDayLunch);

        return view('admin.predictions.index', compact(
            'snackPredictionsToday',
            'snackPredictionsNextDay',
            'lunchPredictionsToday',
            'lunchPredictionsNextDay'
        ));
    }

    private function calculateSnackPredictions($morning, $afternoon)
    {
        $snacks = Snack::all();
        $predictions = ['morning' => [], 'afternoon' => []];

        foreach ($snacks as $snack) {
            if ($snack->time == 'morning') {
                $quantity = $snack->quantity_per_person * $morning;
                $predictions['morning'][] = ['item' => $snack->item, 'quantity' => $quantity, 'unit' => 'pcs'];
            } else {
                $quantity = $snack->quantity_per_person * $afternoon;
                $predictions['afternoon'][] = ['item' => $snack->item, 'quantity' => $quantity, 'unit' => 'pcs'];
            }
        }

        return $predictions;
    }

    private function calculateLunchPredictions($average)
    {
        $lunches = Lunch::all();
        $predictions = [];

        foreach ($lunches as $lunch) {
            $quantity = ($lunch->quantity_per_person * $average) / 1000; // Convert grams to kilograms
            $predictions[] = ['item' => $lunch->item, 'quantity' => $quantity, 'unit' => 'kg'];
        }

        return $predictions;
    }
}
