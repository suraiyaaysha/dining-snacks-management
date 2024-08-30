@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Add Lunch Item</h2>
        <form action="{{ route('admin.lunch.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Lunch Item</button>
        </form>
    </div>
@endsection
