@extends('admin.layouts.app')

@section('main')
    <div class="px-4 pb-8 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
        <div class="sm:flex sm:items-center mt-6">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Edit Manpower</h1>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 ">
                <div class="py-2 align-middle sm:px-6 lg:px-8 w-[800px]">
                    <form action="{{ route('admin.manpower.update', $manpower->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="shift_general" :value="__('Shift General:')" />
                            <x-text-input id="shift_general" class="block mt-1 w-full" type="number" name="shift_general"
                            required autofocus autocomplete="shift_general" value="{{ $manpower->shift_general }}" />
                            <x-input-error :messages="$errors->get('shift_general')" class="mt-2" />
                        </div>
                        
                        <div class="mb-4">
                            <x-input-label for="shift_a" :value="__('Shift A:')" />
                            <x-text-input id="shift_a" class="block mt-1 w-full" type="number" name="shift_a"
                            required autofocus autocomplete="shift_a" value="{{ $manpower->shift_a }}" />
                            <x-input-error :messages="$errors->get('shift_a')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="shift_b" :value="__('Shift B:')" />
                            <x-text-input id="shift_b" class="block mt-1 w-full" type="number" name="shift_b"
                            required autofocus autocomplete="shift_b" value="{{ $manpower->shift_b }}" />
                            <x-input-error :messages="$errors->get('shift_b')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="shift_c" :value="__('Shift C:')" />
                            <x-text-input id="shift_c" class="block mt-1 w-full" type="number" name="shift_c"
                            required autofocus autocomplete="shift_c" value="{{ $manpower->shift_c }}" />
                            <x-input-error :messages="$errors->get('shift_c')" class="mt-2" />
                        </div>
                        <x-primary-button class="w-full">
                            {{ __('Update Manpower') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
