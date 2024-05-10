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
            'route' => route('our_service.index'),
            'active' => request()->routeIs('our_service.index'),
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

<header class="bg-white border-b-2 border-[#C5C5C5] sticky top-0 z-50">
    <x-container class="py-2 px-4">

        <div class="flex justify-between items-center">

            <button class="text-2xl lg:hidden" x-on:click="open = true">
                <i class="fas fa-bars"></i>
            </button>

            {{-- Logo empresa --}}
            <div class="flex">
                <a href="/" class="flex items-center">
                    <img class="size-[52px] object-cover border-[3px] rounded-full"
                        src="{{ asset('img/logo-navbar.png') }}" alt="">
                    <h1 class="ml-2 text-xl font-black">Clínica Dental</h1>
                </a>
            </div>
            {{-- Enlaces --}}
            <div class="flex-1 hidden lg:block">
                <div class="flex justify-center space-x-8 h-full">
                    @foreach ($links as $link)
                        <a href="{{ $link['route'] }}"
                            class="text-base font-semibold hover:text-[#0069F4] {{ $link['active'] ? 'text-[#0069F4] underline underline-offset-[6px]' : '' }}">
                            {{ $link['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="hidden lg:block">
                <a href="{{ route('admin.dashboard') }}" class="text-base text-white px-7 py-2.5 bg-blue-600 rounded-lg">
                    Intranet
                </a>
            </div>
        </div>

    </x-container>

    {{-- Menu mobile --}}
    <nav x-show="open" id="navigation-menu" class="bg-gray-700 bg-opacity-25 w-full absolute lg:hidden"
        style="display: none;">

        <div x-on:click.away="open=false" class="bg-white h-full w-6/12 md:w-5/12 overflow-y-auto mt-[1.9px]">
            <ul class="mt-2">
                @foreach ($links as $link)
                    <li class="py-3 px-4 sm:px-6">
                        <a href="{{ $link['route'] }}"
                            class="text-base font-semibold hover:text-[#0069F4] {{ $link['active'] ? 'text-[#0069F4]' : '' }}">
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
                <li class="py-3 px-4 sm:px-6">
                    <a href="{{ route('admin.dashboard') }}" class="text-base text-white px-7 py-2 bg-blue-600 rounded-xl">
                        Intranet
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</header>
