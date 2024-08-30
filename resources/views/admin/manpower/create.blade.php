<!-- resources/views/manpower/create.blade.php -->
{{-- @extends('admin.layouts.app')

@section('main')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2>Create Manpower</h2>
        <form action="{{ route('manpower.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="shift" :value="__('Shift')" />
                <x-input id="shift" class="block mt-1 w-full" type="text" name="shift" required autofocus />
            </div>
            <div>
                <x-label for="count" :value="__('Count')" />
                <x-input id="count" class="block mt-1 w-full" type="number" name="count" required />
            </div>
            <x-button class="mt-4">
                {{ __('Save') }}
            </x-button>
        </form>
    </div>
@endsection --}}

@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Add Manpower</h2>
        <form action="{{ route('admin.manpower.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="shift_a">Shift A:</label>
                <input type="number" class="form-control" id="shift_a" name="shift_a" required>
            </div>
            <div class="form-group">
                <label for="shift_general">Shift General:</label>
                <input type="number" class="form-control" id="shift_general" name="shift_general" required>
            </div>
            <div class="form-group">
                <label for="shift_b">Shift B:</label>
                <input type="number" class="form-control" id="shift_b" name="shift_b" required>
            </div>
            <div class="form-group">
                <label for="shift_c">Shift C:</label>
                <input type="number" class="form-control" id="shift_c" name="shift_c" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Manpower</button>
        </form>
    </div>
@endsection
