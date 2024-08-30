@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Edit Snack</h2>
        <form action="{{ route('admin.snacks.update', $snack->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $snack->name }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $snack->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="shift">Shift:</label>
                <input type="text" class="form-control" id="shift" name="shift" value="{{ $snack->shift }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Snack</button>
        </form>
    </div>
@endsection
