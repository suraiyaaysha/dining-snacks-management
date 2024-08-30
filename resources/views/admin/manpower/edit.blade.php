@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Edit Manpower</h2>
        <form action="{{ route('admin.manpower.update', $manpower->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="shift_a">Shift A:</label>
                <input type="number" class="form-control" id="shift_a" name="shift_a" value="{{ $manpower->shift_a }}" required>
            </div>
            <div class="form-group">
                <label for="shift_general">Shift General:</label>
                <input type="number" class="form-control" id="shift_general" name="shift_general" value="{{ $manpower->shift_general }}" required>
            </div>
            <div class="form-group">
                <label for="shift_b">Shift B:</label>
                <input type="number" class="form-control" id="shift_b" name="shift_b" value="{{ $manpower->shift_b }}" required>
            </div>
            <div class="form-group">
                <label for="shift_c">Shift C:</label>
                <input type="number" class="form-control" id="shift_c" name="shift_c" value="{{ $manpower->shift_c }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Manpower</button>
        </form>
    </div>
@endsection
