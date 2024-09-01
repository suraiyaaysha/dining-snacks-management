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
        // Get today's date
        $today = now()->toDateString();
        
        // Calculate average manpower
        $manpower = Manpower::all();
        $averageShiftA = $manpower->avg('shift_a');
        $averageShiftB = $manpower->avg('shift_b');
        $averageShiftGeneral = $manpower->avg('shift_general');
        $averageShiftC = $manpower->avg('shift_c');

        // Calculate today's manpower
        $totalPeopleMorningSnacks = $averageShiftA + $averageShiftGeneral;
        $totalPeopleAfternoonSnacks = $averageShiftB + $averageShiftC;
        $totalPeopleLunch = $averageShiftA + $averageShiftB + $averageShiftGeneral;

        // Predict next day's manpower
        $nextDay = now()->addDay()->toDateString();
        $nextDayManpower = Manpower::whereDate('date', $nextDay)->first();

        if ($nextDayManpower) {
            $nextDayShiftA = $nextDayManpower->shift_a;
            $nextDayShiftB = $nextDayManpower->shift_b;
            $nextDayShiftGeneral = $nextDayManpower->shift_general;
            $nextDayShiftC = $nextDayManpower->shift_c;

            $nextDayTotalPeopleMorningSnacks = $nextDayShiftA + $nextDayShiftGeneral;
            $nextDayTotalPeopleAfternoonSnacks = $nextDayShiftB + $nextDayShiftC;
            $nextDayTotalPeopleLunch = $nextDayShiftA + $nextDayShiftB + $nextDayShiftGeneral;
        } else {
            // Default to today's prediction if next day data isn't available
            $nextDayTotalPeopleMorningSnacks = $totalPeopleMorningSnacks;
            $nextDayTotalPeopleAfternoonSnacks = $totalPeopleAfternoonSnacks;
            $nextDayTotalPeopleLunch = $totalPeopleLunch;
        }

        // Snack and lunch item predictions
        $snackPredictionsToday = $this->calculateSnackPredictions($totalPeopleMorningSnacks, $totalPeopleAfternoonSnacks);
        $snackPredictionsNextDay = $this->calculateSnackPredictions($nextDayTotalPeopleMorningSnacks, $nextDayTotalPeopleAfternoonSnacks);

        $lunchPredictionsToday = $this->calculateLunchPredictions($totalPeopleLunch);
        $lunchPredictionsNextDay = $this->calculateLunchPredictions($nextDayTotalPeopleLunch);

        return view('admin.predictions.index', compact(
            'snackPredictionsToday',
            'snackPredictionsNextDay',
            'lunchPredictionsToday',
            'lunchPredictionsNextDay',
            'totalPeopleMorningSnacks',
            'totalPeopleAfternoonSnacks',
            'totalPeopleLunch',
            'nextDayTotalPeopleMorningSnacks',
            'nextDayTotalPeopleAfternoonSnacks',
            'nextDayTotalPeopleLunch'
        ));
    }

    private function calculateSnackPredictions($morning, $afternoon)
    {
        $snacks = Snack::all();
        $predictions = ['morning' => [], 'afternoon' => []];

        foreach ($snacks as $snack) {
            if ($snack->time == 'morning') {
                $quantity = round($snack->quantity_per_person * $morning); // Round to nearest whole number
                $predictions['morning'][] = ['item' => $snack->item, 'quantity' => $quantity, 'unit' => 'pcs'];
            } else {
                $quantity = round($snack->quantity_per_person * $afternoon); // Round to nearest whole number
                $predictions['afternoon'][] = ['item' => $snack->item, 'quantity' => $quantity, 'unit' => 'pcs'];
            }
        }

        return $predictions;
    }

    private function calculateLunchPredictions($totalPeople)
    {
        $lunches = Lunch::all();
        $predictions = [];

        foreach ($lunches as $lunch) {
            $quantity = ($lunch->quantity_per_person * $totalPeople) / 1000; // Convert grams to kilograms
            $predictions[] = ['item' => $lunch->item, 'quantity' => round($quantity, 2), 'unit' => 'kg']; // Round to 2 decimal places
        }

        return $predictions;
    }
}
