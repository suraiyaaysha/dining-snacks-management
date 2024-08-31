    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">

                    <li>
                        <x-nav-link href="{{ route('admin.dashboard') }}"
                            :active="request()->routeIs('admin.dashboard')">

                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600 
                                @if (request()->routeIs('dashboard')) text-indigo-600 @endif"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>


                    <h1 class="mt-8">Manpower Management:</h1>
                    
                    <li>
                        <x-nav-link href="{{route('admin.manpower.index')}}" :active="request()->routeIs('admin.manpower.index')">

                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                            {{ __('Manpower List') }}
                        </x-nav-link>
                    </li>
                    
                    <li>
                        <x-nav-link href="{{ route('admin.manpower.quantities') }}" :active="request()->routeIs('admin.manpower.quantities')">
                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>
                            {{ __('Manpower Quantities') }}
                        </x-nav-link>
                    </li>
                    
                    <li>
                        <x-nav-link href="{{route('admin.snacks.index')}}" :active="request()->routeIs('admin.snacks.index')">

                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                            {{ __('Snacks') }}
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{route('admin.lunch.index')}}" :active="request()->routeIs('admin.lunch.index')">

                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                            {{ __('Lunches') }}
                        </x-nav-link>
                    </li>

                    <h1 class="mt-8">Menu Management:</h1>

                    <li>
                        <x-nav-link href="{{route('admin.menu-assignment.index')}}" :active="request()->routeIs('admin.menu-assignment.index')">

                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                            {{ __('Assign Menu') }}
                        </x-nav-link>
                    </li>

                    <h1 class="mt-8">Prediction and Reporting:</h1>

                    <li>
                        <x-nav-link href="{{route('admin.predictions.snacks')}}" :active="request()->routeIs('admin.predictions.snacks')">

                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                            {{ __('Snacks Report') }}
                        </x-nav-link>
                    </li>

                    <li>
                        <x-nav-link href="{{route('admin.predictions.lunch')}}" :active="request()->routeIs('admin.predictions.lunch')">

                            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>

                            {{ __('Lunch Report') }}
                        </x-nav-link>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
