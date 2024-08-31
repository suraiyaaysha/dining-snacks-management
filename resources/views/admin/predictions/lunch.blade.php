@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Lunch Predictions</h2>
        <p>Predicted Lunches for Today: {{ $predictedLunch }}</p>
    </div>
@endsection
