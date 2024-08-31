@extends('admin.layouts.app')

@section('main')
    <div class="px-4 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
        <div class="sm:flex sm:items-center mt-6">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Manpower Quantities depending on Snacks and Lunch Distribution:</h1>
            </div>
        </div>
        <div class="mt-2 mb-4 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                    <h3>Snacks - Morning (A Shift + General Shift): {{ $snacksMorning }}</h3>
                    <h3>Snacks - Afternoon (B Shift + C Shift): {{ $snacksAfternoon }}</h3>
                    <h3>Lunch (General Shift + A Shift + B Shift): {{ $lunch }}</h3>

                </div>
            </div>
        </div>
    </div>
@endsection
