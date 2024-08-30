@extends('admin.layouts.app')

@section('main')
    <div class="container">
        <h2>Snack List</h2>
        <a href="{{ route('admin.snacks.create') }}" class="btn btn-primary">Add Snack</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Shift</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($snacks as $snack)
                    <tr>
                        <td>{{ $snack->name }}</td>
                        <td>{{ $snack->quantity }}</td>
                        <td>{{ $snack->shift }}</td>
                        <td>
                            <a href="{{ route('admin.snacks.edit', $snack->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.snacks.destroy', $snack->id) }}" method="POST" style="display:inline-block;">
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
