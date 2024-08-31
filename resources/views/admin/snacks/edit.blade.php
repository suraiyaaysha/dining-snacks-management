@extends('admin.layouts.app')

@section('main')
<div class="px-4 pb-8 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
    <div class="sm:flex sm:items-center mt-6">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Edit Snack</h1>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 ">
            <div class="py-2 align-middle sm:px-6 lg:px-8 w-[800px]">
                <form action="{{ route('admin.snacks.update', $snack->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <x-input-label for="item" :value="__('Item:')" />
                        <x-text-input id="item" class="block mt-1 w-full" type="text" name="item" value="{{ $snack->item }}"
                        required autofocus autocomplete="item" />
                        <x-input-error :messages="$errors->get('item')" class="mt-2" />

                    </div>
                    <div class="mb-4">
                        <x-input-label for="time" :value="__('Time:')" />
                        <select class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" id="time" name="time" required>
                            <option value="morning" {{ $snack->time == 'morning' ? 'selected' : '' }}>Morning</option>
                            <option value="afternoon" {{ $snack->time == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                        </select>
                        <x-input-error :messages="$errors->get('time')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="quantity_per_person" :value="__('Quantity Per Person (pcs):')" />
                        <x-text-input id="quantity_per_person" class="block mt-1 w-full" type="number" name="quantity_per_person" value="{{ $snack->quantity_per_person }}"
                        required autofocus autocomplete="quantity_per_person" />
                        <x-input-error :messages="$errors->get('quantity_per_person')" class="mt-2" />
                    </div>
                    <x-primary-button class="w-full">
                        {{ __('Update Snack') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
