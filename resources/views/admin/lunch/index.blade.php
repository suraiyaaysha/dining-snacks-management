@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Lunch List</h2>
        <a href="{{ route('admin.lunch.create') }}" class="btn btn-primary">Add Lunch Item</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lunches as $lunch)
                    <tr>
                        <td>{{ $lunch->name }}</td>
                        <td>{{ $lunch->quantity }}</td>
                        <td>
                            <a href="{{ route('admin.lunch.edit', $lunch->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.lunch.destroy', $lunch->id) }}" method="POST" style="display:inline-block;">
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
