@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Assign Menu</h2>
        <form action="{{ route('admin.menu-assignment.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="meal_type">Meal Type:</label>
                <select class="form-control" id="meal_type" name="meal_type" required>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Snacks">Snacks</option>
                </select>
            </div>
            <div class="form-group">
                <label for="menu_items">Menu Items:</label>
                <select class="form-control" id="menu_items" name="menu_items[]" multiple required>
                    @foreach($menuItems as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign Menu</button>
        </form>
    </div>
@endsection
