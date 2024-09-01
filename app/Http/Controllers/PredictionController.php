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
        $averageShiftA = $manpower->avg('shift_a');
        $averageShiftB = $manpower->avg('shift_b');
        $averageShiftGeneral = $manpower->avg('shift_general');
        $averageShiftC = $manpower->avg('shift_c');

        // Calculate total number of people expected to take snacks and lunch today
        $totalPeopleMorningSnacks = $averageShiftA + $averageShiftGeneral; // A Shift + General Shift
        $totalPeopleAfternoonSnacks = $averageShiftB + $averageShiftC;   // B Shift + C Shift

        $totalPeopleLunch = $averageShiftA + $averageShiftB + $averageShiftGeneral; // A Shift + B Shift + General Shift

        // Assume predictions for next day are same as today
        $nextDayTotalPeopleMorningSnacks = $totalPeopleMorningSnacks;
        $nextDayTotalPeopleAfternoonSnacks = $totalPeopleAfternoonSnacks;
        $nextDayTotalPeopleLunch = $totalPeopleLunch;

        // Snack and lunch item predictions for today and next day
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
                $quantity = $snack->quantity_per_person * $morning;
                $predictions['morning'][] = ['item' => $snack->item, 'quantity' => $quantity, 'unit' => 'pcs'];
            } else {
                $quantity = $snack->quantity_per_person * $afternoon;
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
            $predictions[] = ['item' => $lunch->item, 'quantity' => $quantity, 'unit' => 'kg'];
        }

        return $predictions;
    }
}
