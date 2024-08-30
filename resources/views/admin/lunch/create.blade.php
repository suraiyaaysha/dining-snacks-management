@extends('admin.layouts.app')

@section('main')
<div class="px-4 pb-8 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
    <div class="sm:flex sm:items-center mt-6">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Add Lunch Item</h1>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 ">
            <div class="py-2 align-middle sm:px-6 lg:px-8 w-[800px]">
                <form action="{{ route('admin.lunch.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="item" :value="__('Item:')" />
                        <x-text-input id="item" class="block mt-1 w-full" type="text" name="item"
                        required autofocus autocomplete="item" />
                        <x-input-error :messages="$errors->get('item')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="quantity_per_person" :value="__('Quantity Per Person:')" />
                        <x-text-input id="quantity_per_person" class="block mt-1 w-full" type="number" name="quantity_per_person"
                        required autofocus autocomplete="quantity_per_person" />
                        <x-input-error :messages="$errors->get('quantity_per_person')" class="mt-2" />
                    </div>
                    <x-primary-button class="w-full">
                        {{ __('Add Lunch Item') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
