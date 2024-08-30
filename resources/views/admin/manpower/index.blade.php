@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Manpower List</h2>
        <a href="{{ route('admin.manpower.create') }}" class="btn btn-primary">Add Manpower</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Shift A</th>
                    <th>Shift General</th>
                    <th>Shift B</th>
                    <th>Shift C</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manpower as $mp)
                    <tr>
                        <td>{{ $mp->shift_a }}</td>
                        <td>{{ $mp->shift_general }}</td>
                        <td>{{ $mp->shift_b }}</td>
                        <td>{{ $mp->shift_c }}</td>
                        <td>{{ $mp->total }}</td>
                        <td>
                            <a href="{{ route('admin.manpower.edit', $mp->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.manpower.destroy', $mp->id) }}" method="POST" style="display:inline-block;">
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
@endsection
