{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Assign Menu</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('menu-assignment.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="day_of_week" class="block text-gray-700">Day of Week</label>
            <input type="text" name="day_of_week" id="day_of_week" class="border rounded p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="snack_ids" class="block text-gray-700">Select Snacks</label>
            <select name="snack_ids[]" id="snack_ids" multiple class="border rounded p-2 w-full" required>
                @foreach($snacks as $snack)
                    <option value="{{ $snack->id }}">{{ $snack->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="lunch_ids" class="block text-gray-700">Select Lunches</label>
            <select name="lunch_ids[]" id="lunch_ids" multiple class="border rounded p-2 w-full" required>
                @foreach($lunches as $lunch)
                    <option value="{{ $lunch->id }}">{{ $lunch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Assign Menu</button>
        </div>
    </form>
</div>
@endsection --}}

{{-- @extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Menu Assignment</h2>
        <a href="{{ route('admin.menu-assignment.create') }}" class="btn btn-primary">Assign Menu</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Meal Type</th>
                    <th>Menu Items</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuAssignments as $assignment)
                    <tr>
                        <td>{{ $assignment->date }}</td>
                        <td>{{ $assignment->meal_type }}</td>
                        <td>{{ implode(', ', $assignment->menu_items) }}</td>
                        <td>
                            <a href="{{ route('admin.menu-assignment.edit', $assignment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.menu-assignment.destroy', $assignment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}

@extends('admin.layouts.app')

@section('main')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Assign Menu</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.menu-assignment.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="day_of_week" class="block text-gray-700">Day of Week</label>
            <input type="text" name="day_of_week" id="day_of_week" class="border rounded p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="snack_ids" class="block text-gray-700">Select Snacks</label>
            <select name="snack_ids[]" id="snack_ids" multiple class="border rounded p-2 w-full" required>
                @foreach($snacks as $snack)
                    <option value="{{ $snack->id }}">{{ $snack->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="lunch_ids" class="block text-gray-700">Select Lunches</label>
            <select name="lunch_ids[]" id="lunch_ids" multiple class="border rounded p-2 w-full" required>
                @foreach($lunches as $lunch)
                    <option value="{{ $lunch->id }}">{{ $lunch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Assign Menu</button>
        </div>
    </form>
</div>
@endsection
