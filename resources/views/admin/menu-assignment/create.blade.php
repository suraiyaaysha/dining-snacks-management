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
                <form action="{{ route('admin.menu-assignment.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="date" :value="__('Date:')" />
                        <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" required autofocus />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="morning_snack_ids" :value="__('Select Morning Snacks:')" />
                        <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" id="morning_snack_ids" name="morning_snack_ids[]" multiple>
                            @foreach($morningSnacks as $snack)
                                <option value="{{ $snack->id }}">{{ $snack->item }} ({{ $snack->quantity_per_person }} pcs/person)</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('morning_snack_ids')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="afternoon_snack_ids" :value="__('Select Afternoon Snacks:')" />
                        <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" id="afternoon_snack_ids" name="afternoon_snack_ids[]" multiple>
                            @foreach($afternoonSnacks as $snack)
                                <option value="{{ $snack->id }}">{{ $snack->item }} ({{ $snack->quantity_per_person }} pcs/person)</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('afternoon_snack_ids')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="lunch_ids" :value="__('Select Lunch Items:')" />
                        <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" id="lunch_ids" name="lunch_ids[]" multiple>
                            @foreach($lunches as $lunch)
                            <option value="{{ $lunch->id }}">{{ $lunch->item }} ({{ $lunch->quantity_per_person }} grams/person)</option>
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
