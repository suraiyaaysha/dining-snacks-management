@extends('admin.layouts.app')

@section('main')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold leading-tight text-gray-800 mb-6">Prediction and Reporting</h2>

    {{-- Snacks Predictions --}}
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h3 class="text-xl font-medium leading-6 text-gray-900">Snacks Item Qty - Today</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <h4 class="text-lg font-medium text-gray-700">Morning Shift (A Shift + General Shift):</h4>
                <p class="text-lg text-gray-700">{{ number_format($totalPeopleMorningSnacks) }} people</p>
                <ul class="list-disc list-inside text-gray-600 mt-2">
                    @foreach($snackPredictionsToday['morning'] as $prediction)
                        <li>{{ $prediction['item'] }} - {{ $prediction['quantity'] }} {{ $prediction['unit'] }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-medium text-gray-700">Afternoon Shift (B Shift + C Shift):</h4>
                <p class="text-lg text-gray-700">{{ number_format($totalPeopleAfternoonSnacks) }} people</p>
                <ul class="list-disc list-inside text-gray-600 mt-2">
                    @foreach($snackPredictionsToday['afternoon'] as $prediction)
                        <li>{{ $prediction['item'] }} - {{ $prediction['quantity'] }} {{ $prediction['unit'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h3 class="text-xl font-medium leading-6 text-gray-900 mt-8">Snacks Item Qty - Next Day</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <h4 class="text-lg font-medium text-gray-700">Morning Shift (A Shift + General Shift):</h4>
                <p class="text-lg text-gray-700">{{ number_format($nextDayTotalPeopleMorningSnacks) }} people</p>
                <ul class="list-disc list-inside text-gray-600 mt-2">
                    @foreach($snackPredictionsNextDay['morning'] as $prediction)
                        <li>{{ $prediction['item'] }} - {{ $prediction['quantity'] }} {{ $prediction['unit'] }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-medium text-gray-700">Afternoon Shift (B Shift + C Shift):</h4>
                <p class="text-lg text-gray-700">{{ number_format($nextDayTotalPeopleAfternoonSnacks) }} people</p>
                <ul class="list-disc list-inside text-gray-600 mt-2">
                    @foreach($snackPredictionsNextDay['afternoon'] as $prediction)
                        <li>{{ $prediction['item'] }} - {{ $prediction['quantity'] }} {{ $prediction['unit'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Total People Taking Lunch Today --}}
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h3 class="text-xl font-medium leading-6 text-gray-900">Total people will take Lunch Today</h3>
        <p class="text-lg text-gray-700">{{ number_format($totalPeopleLunch) }} people</p>
    </div>
    {{-- Total People Taking Lunch Next Day --}}
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h3 class="text-xl font-medium leading-6 text-gray-900">Total people will take Lunch Next Day</h3>
        <p class="text-lg text-gray-700">{{ number_format($nextDayTotalPeopleLunch) }} people</p>
    </div>

    {{-- Lunch Predictions --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-medium leading-6 text-gray-900">Lunch Item Qty - Today</h3>
        <ul class="list-disc list-inside text-gray-600 mt-2">
            @foreach($lunchPredictionsToday as $prediction)
                <li>{{ $prediction['item'] }} - {{ number_format($prediction['quantity'], 2) }} {{ $prediction['unit'] }}</li>
            @endforeach
        </ul>

        <h3 class="text-xl font-medium leading-6 text-gray-900 mt-8">Lunch Item Qty - Next Day</h3>
        <ul class="list-disc list-inside text-gray-600 mt-2">
            @foreach($lunchPredictionsNextDay as $prediction)
                <li>{{ $prediction['item'] }} - {{ number_format($prediction['quantity'], 2) }} {{ $prediction['unit'] }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
