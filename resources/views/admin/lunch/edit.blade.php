@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Edit Lunch Item</h2>
        <form action="{{ route('admin.lunch.update', $lunch->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $lunch->name }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $lunch->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Lunch Item</button>
        </form>
    </div>
@endsection
