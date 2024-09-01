@extends('admin.layouts.app')

@section('main')
<div class="px-4 pb-8 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
    <div class="sm:flex sm:items-center mt-6">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Edit Menu Assignment</h1>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 ">
            <div class="py-2 align-middle sm:px-6 lg:px-8 w-[800px]">
                <form action="{{ route('admin.menu-assignment.update', $menuAssignment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="day_of_week" :value="__('Day of Week:')" />
                        <x-text-input id="day_of_week" class="block mt-1 w-full" type="text" name="day_of_week" value="{{ $menuAssignment->day_of_week }}"
                        required autofocus autocomplete="day_of_week" />
                        <x-input-error :messages="$errors->get('day_of_week')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="morning_snack_ids" :value="__('Select Morning Snacks:')" />
                        <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" id="morning_snack_ids" name="morning_snack_ids[]" multiple>
                            @foreach($morningSnacks as $snack)
                                <option value="{{ $snack->id }}" {{ in_array($snack->id, $menuAssignment->morningSnacks->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $snack->item }} ({{ $snack->quantity_per_person }} pcs/person)
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('morning_snack_ids')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="afternoon_snack_ids" :value="__('Select Afternoon Snacks:')" />
                        <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" id="afternoon_snack_ids" name="afternoon_snack_ids[]" multiple>
                            @foreach($afternoonSnacks as $snack)
                                <option value="{{ $snack->id }}" {{ in_array($snack->id, $menuAssignment->afternoonSnacks->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $snack->item }} ({{ $snack->quantity_per_person }} pcs/person)
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('afternoon_snack_ids')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="lunch_ids" :value="__('Select Lunch:')" />
                        <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" id="lunch_ids" name="lunch_ids[]" multiple>
                            @foreach($lunchItems as $lunch)
                                <option value="{{ $lunch->id }}" {{ in_array($lunch->id, $menuAssignment->lunchItems->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $lunch->item }} ({{ $lunch->quantity_per_person }} pcs/person)
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('lunch_ids')" class="mt-2" />
                    </div>

                    <x-primary-button class="w-full">
                        {{ __('Update Menu') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
