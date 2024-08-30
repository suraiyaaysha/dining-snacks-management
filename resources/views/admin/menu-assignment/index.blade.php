@extends('admin.layouts.app')

@section('main')
<div class="px-4 pb-8 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
    <div class="sm:flex sm:items-center mt-6">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Assign Menu</h1>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 ">
            <div class="py-2 align-middle sm:px-6 lg:px-8 w-[800px]">
                @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
                <form action="{{ route('admin.menu-assignment.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="day_of_week" :value="__('Day of Week:')" />
                        <x-text-input id="day_of_week" class="block mt-1 w-full" type="text" name="day_of_week"
                        required autofocus autocomplete="day_of_week" />
                        <x-input-error :messages="$errors->get('day_of_week')" class="mt-2" />

                    </div>
                    <div class="mb-4">
                        <x-input-label for="snack_ids" :value="__('Select Snack:')" />
                        <select name="snack_ids[]" id="snack_ids" multiple autocomplete="snack_ids" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            @foreach($snacks as $snack)
                                <option value="{{ $snack->id }}">{{ $snack->item }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('snack_ids')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="lunch_ids" :value="__('Select Lunches:')" />
                        <select name="lunch_ids[]" id="lunch_ids" multiple autocomplete="lunch_ids" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            @foreach($lunches as $lunch)
                                <option value="{{ $lunch->id }}">{{ $lunch->item }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('lunch_ids')" class="mt-2" />
                    </div>

                    <x-primary-button class="w-full">
                        {{ __('Assign Menu') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
