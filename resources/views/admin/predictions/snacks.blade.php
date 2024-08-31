@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Snack Predictions</h2>
        <p>Predicted Snacks for Morning: {{ $predictedSnacksMorning }}</p>
        <p>Predicted Snacks for Afternoon: {{ $predictedSnacksAfternoon }}</p>
    </div>
@endsection
