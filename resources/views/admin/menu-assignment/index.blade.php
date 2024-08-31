@extends('admin.layouts.app')

@section('main')
<div class="px-4 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
    <div class="sm:flex sm:items-center mt-6">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Menu Assignments</h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.menu-assignment.create') }}"
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Assign New Menu</a>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Day of Week</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Morning Snacks Items</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Afternoon Snacks Items</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Lunch Items</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 text-right">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($menuAssignments as $assignment)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $assignment->day_of_week }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @foreach(json_decode($assignment->morning_snack_ids) as $snack_id)
                                        {{ \App\Models\Snack::find($snack_id)->item }} ({{ \App\Models\Snack::find($snack_id)->quantity_per_person }} pcs/person)<br>
                                    @endforeach
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @foreach(json_decode($assignment->afternoon_snack_ids) as $snack_id)
                                        {{ \App\Models\Snack::find($snack_id)->item }} ({{ \App\Models\Snack::find($snack_id)->quantity_per_person }} pcs/person)<br>
                                    @endforeach
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @foreach(json_decode($assignment->lunch_ids) as $lunch_id)
                                        {{ \App\Models\Lunch::find($lunch_id)->item }} ({{ \App\Models\Lunch::find($lunch_id)->quantity_per_person }} grams/person)<br>
                                    @endforeach
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">

                                    <a href="{{ route('admin.menu-assignment.edit', $assignment->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.menu-assignment.destroy', $assignment->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

