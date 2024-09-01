<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @stack('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-screen bg-gray-100">

        <div x-data="{ isOpen: false }">

            <!-- Sidebar Navbar Start -->

            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true" x-show="isOpen">

                <div class="fixed inset-0 bg-gray-900/80"></div>

                <div class="fixed inset-0 flex">
                    <div class="relative mr-16 flex w-full max-w-xs flex-1">

                        <div class="absolute left-full top-0 flex w-16 justify-center pt-5" @click="isOpen = !isOpen">
                            <button type="button" class="-m-2.5 p-2.5">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Static sidebar for Mobile -->
                        <div
                            class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
                            <div class="flex h-16 shrink-0 items-center">
                                D&SMSystem
                            </div>
                            @include('admin.layouts.sidebar-navigation')
                        </div>

                    </div>
                </div>
            </div>

            <!-- Static sidebar for Desktop -->
            <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
                <!-- Sidebar navigation component -->
                <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
                    <div class="flex h-16 shrink-0 items-center font-bold">
                        D&SMSystem
                    </div>

                    @include('admin.layouts.sidebar-navigation')

                </div>
            </div>

            <!-- Sidebar Navbar End -->

            <div class="lg:pl-72">

                <!-- Top Navbar Start -->
                @include('admin.layouts.top-navbar')
                <!-- Top Navbar End-->

                <main class="py-10">
                    <div class="px-4 sm:px-6 lg:px-8">

                        @yield('main')

                    </div>
                </main>
            </div>
        </div>

    </div>

    @stack('script')

</body>

</html>
