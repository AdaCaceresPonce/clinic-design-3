@php
    $links = [
        [
            'name' => 'Inicio',
            'route' => route('welcome.index'),
            'active' => request()->routeIs('welcome.index'),
        ],
        [
            'name' => 'Nosotros',
            'route' => route('about_us.index'),
            'active' => request()->routeIs('about_us.index'),
        ],
        [
            'name' => 'Servicios',
            'route' => route('our_services.index'),
            'active' => request()->routeIs('our_services.*'),
        ],
        [
            'name' => 'Profesionales',
            'route' => route('our_professionals.index'),
            'active' => request()->routeIs('our_professionals.index'),
        ],
        [
            'name' => 'Contacto',
            'route' => route('contact_us.index'),
            'active' => request()->routeIs('contact_us.index'),
        ],
    ];
@endphp

<header class="bg-white shadow-md sticky top-0 z-50">
    <x-container class="py-3 px-4">

        <div class="flex justify-between items-center gap-3">

            {{-- Botón menú móvil --}}
            <button class="text-gray-700 hover:text-[#0075FF] transition-colors lg:hidden" x-on:click="open = true"
                aria-label="Abrir menú">

                {{-- ícono --}}
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

            </button>

            {{-- Logo empresa --}}
            <div class="flex">
                <a href="{{ route('welcome.index') }}" class="flex items-center gap-3 group">
                    <img class="w-11 h-11 sm:w-12 sm:h-12 object-cover ring-2 ring-blue-100 rounded-full"
                        src="{{ Storage::url(data_get($clinicInformation, 'navbar_clinic_logo', 'images/default-logo.png')) }}"
                        alt="">

                    <div class="">
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">Clínica Dental</h1>
                        <p class="text-xs text-gray-600">Tu sonrisa, nuestra pasión</p>
                    </div>
                </a>
            </div>

            {{-- Enlaces Escritorio --}}
            <nav class="flex-1 hidden lg:flex justify-end">
                <ul class="flex items-center gap-2">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['route'] }}"
                                class="relative px-4 py-2 text-sm font-medium rounded-full transition-all duration-200
                                      {{ $link['active'] ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }}">

                                {{ $link['name'] }}

                                @if ($link['active'])
                                    <span
                                        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-1/2 h-0.5 bg-blue-600 rounded-full"></span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            {{-- Botones CTA --}}
            <div class="hidden lg:flex items-center gap-3">

                @isset($clinicInformation->cellphone)
                    {{-- Botón de contacto --}}
                    <a href="{{ route('contact_us.index') }}"
                        class="hidden md:inline-flex items-center gap-2 px-2 py-2.5 text-sm text-[#0075FF] hover:text-blue-700 font-semibold transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="hidden lg:inline">Llamar</span>
                    </a>
                @endisset

                {{-- Botón Intranet --}}
                <div class="flex">
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Intranet
                    </a>
                </div>
            </div>
        </div>

    </x-container>

    {{-- Menú móbile --}}
    <div x-show="open" x-cloak @keydown.escape.window="open = false" class="fixed inset-0 z-60 lg:hidden"
        style="display: none;">

        {{-- Overlay --}}
        <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50">
        </div>

        {{-- Panel lateral --}}
        <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed top-0 left-0 h-full w-72 max-w-[85vw] bg-white shadow-2xl overflow-y-auto">

            {{-- Header del menú --}}
            <div class="flex items-center justify-between p-4 border-b border-gray-200">

                <div class="flex items-center gap-3">
                    <img class="w-10 h-10 object-cover border-2 border-[#0075FF] rounded-full"
                        src="{{ Storage::url(data_get($clinicInformation, 'navbar_clinic_logo', 'images/default-logo.png')) }}"
                        alt="Logo">
                    <span class="font-bold text-gray-900">Menú</span>
                </div>

                {{-- Botón cerrar --}}
                <button @click="open = false"
                    class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors"
                    aria-label="Cerrar menú">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>

            {{-- Enlaces del menú --}}
            <nav class="p-4">

                <ul class="space-y-1">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['route'] }}"
                                class="flex items-center gap-3 px-4 py-3 text-base font-semibold rounded-lg transition-colors
                                      {{ $link['active'] ? 'bg-blue-50 text-[#0075FF]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#0075FF]' }}">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- Botón Intranet en móvil --}}
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center justify-center gap-2 w-full text-white font-semibold bg-blue-600 hover:bg-blue-700 px-4 py-3 rounded-lg shadow-md hover:shadow-lg transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Acceder a Intranet
                    </a>
                </div>
            </nav>
        </div>
    </div>

</header>
