@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Add Snack</h2>
        <form action="{{ route('admin.snacks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="shift">Shift:</label>
                <input type="text" class="form-control" id="shift" name="shift" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Snack</button>
        </form>
    </div>
@endsection
