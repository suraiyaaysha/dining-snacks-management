@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Edit Menu Assignment</h2>
        <form action="{{ route('admin.menu-assignment.update', $menuAssignment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $menuAssignment->date }}" required>
            </div>
            <div class="form-group">
                <label for="meal_type">Meal Type:</label>
                <select class="form-control" id="meal_type" name="meal_type" required>
                    <option value="Breakfast" {{ $menuAssignment->meal_type == 'Breakfast' ? 'selected' : '' }}>Breakfast</option>
                    <option value="Lunch" {{ $menuAssignment->meal_type == 'Lunch' ? 'selected' : '' }}>Lunch</option>
                    <option value="Dinner" {{ $menuAssignment->meal_type == 'Dinner' ? 'selected' : '' }}>Dinner</option>
                    <option value="Snacks" {{ $menuAssignment->meal_type == 'Snacks' ? 'selected' : '' }}>Snacks</option>
                </select>
            </div>
            <div class="form-group">
                <label for="menu_items">Menu Items:</label>
                <select class="form-control" id="menu_items" name="menu_items[]" multiple required>
                    @foreach($menuItems as $item)
                        <option value="{{ $item->name }}" {{ in_array($item->name, $menuAssignment->menu_items) ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Assignment</button>
        </form>
    </div>
@endsection
