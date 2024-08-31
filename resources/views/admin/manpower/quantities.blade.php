@extends('admin.layouts.app')

@section('main')
<div class="px-4 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
    <div class="sm:flex sm:items-center mt-6">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Manpower Quantities</h1>
        </div>
    </div>
    <div class="mt-2 mb-4 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                            <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">Snacks - Morning</th>
                            <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">Snacks - Afternoon</th>
                            <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">Lunch</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($quantities as $quantity)
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm text-gray-900">
                                    {{ \Carbon\Carbon::parse($quantity['date'])->format('l-d F-Y') }}
                                </td>
                                <td class="whitespace-nowrap py-4 text-sm text-gray-500">{{ $quantity['snacksMorning'] }}</td>
                                <td class="whitespace-nowrap py-4 text-sm text-gray-500">{{ $quantity['snacksAfternoon'] }}</td>
                                <td class="whitespace-nowrap py-4 text-sm text-gray-500">{{ $quantity['lunch'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

