<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/c5d68cbda8.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        {{-- @livewire('navigation-menu') --}}

        <div>
            <header class="bg-white border-b-2 border-b-[#C5C5C5]">
                <x-container class="py-2 px-4">

                    <div class="flex justify-between items-center space-x-4">

                        <button class="text-2xl block lg:hidden">
                            <i class="fas fa-bars"></i>
                        </button>

                        {{-- Logo empresa --}}
                        <div class="flex">
                            <a href="/" class="flex items-center">
                                <img class="size-[52px] object-cover" src="{{ asset('img/logo-navbar.png') }}"
                                    alt="">
                                <h1 class="ml-2 text-xl font-black">Clínica Dental</h1>
                            </a>
                        </div>
                        {{-- Enlaces --}}
                        <div class="flex-1 hidden lg:block">
                            <div class="flex justify-center space-x-8 h-full">
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]">Inicio</a>
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]">Nosotros</a>
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]">Servicios</a>
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]">Profesionales</a>
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]">Contacto</a>
                            </div>
                        </div>
                        <div class="hidden lg:block">
                            <button class="text-base text-white px-7 py-2 bg-blue-600 rounded-xl">
                                Intranet
                            </button>
                        </div>
                    </div>

                </x-container>

                {{-- <nav id="navigation-menu"
                    class="bg-neutral-700 bg-opacity-25 w-full absolute">
                    <div class="bg-white h-full overflow-y-auto">
                        <a href="" class="text-base font-semibold hover:text-[#0069F4]"">Inicio</a>
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]"">Nosotros</a>
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]"">Servicios</a>
                                <a href=""
                                    class="text-base font-semibold hover:text-[#0069F4]"">Profesionales</a>
                                <a href="" class="text-base font-semibold hover:text-[#0069F4]"">Contacto</a>
                    </div>
                </nav> --}}
            </header>

            {{-- <div class="fixed top-0 left-0 inset-0 bg-black bg-opacity-25 z-10">

                </div>
                <div class="fixed top-0 left-0 z-20">
                    <div class="w-80 h-screen bg-white">

                        <div class="px-4 py-3 bg-white border-b-2 border-b-[#C5C5C5]">
                            <span class="text-lg">
                                Hola
                            </span>
                        </div>

                    </div>
                </div> --}}
        </div>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
