<header class="bg-white border-b-2 border-[#C5C5C5] sticky top-0 z-50">
    <x-container class="py-2 px-4">

        <div class="flex justify-between items-center">

            <button class="text-2xl lg:hidden" x-on:click="open = true">
                <i class="fas fa-bars"></i>
            </button>

            {{-- Logo empresa --}}
            <div class="flex">
                <a href="/" class="flex items-center">
                    <img class="size-[52px] object-cover border-[3px] rounded-full" src="{{ asset('img/logo-navbar.png') }}"
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

    {{-- Menu mobile --}}
    <nav x-show="open" id="navigation-menu" class="bg-gray-700 bg-opacity-25 w-full absolute lg:hidden"
        style="display: none;">

        <div x-on:click.away="open=false" class="bg-white h-full w-6/12 md:w-5/12 overflow-y-auto mt-[1.9px]">
            <ul class="mt-2">
                <li class="py-3 px-4 sm:px-6">
                    <a href="" class="text-base font-semibold hover:text-[#0069F4]">Inicio</a>
                </li>
                <li class="py-3 px-4 sm:px-6">
                    <a href="" class="text-base font-semibold hover:text-[#0069F4]">Nosotros</a>
                </li>
                <li class="py-3 px-4 sm:px-6">
                    <a href="" class="text-base font-semibold hover:text-[#0069F4]">Servicios</a>
                </li>
                <li class="py-3 px-4 sm:px-6">
                    <a href="" class="text-base font-semibold hover:text-[#0069F4]">Profesionales</a>
                </li>
                <li class="py-3 px-4 sm:px-6">
                    <a href="" class="text-base font-semibold hover:text-[#0069F4]">Contacto</a>
                </li>
                <li class="py-3 px-4 sm:px-6">
                    <button class="text-base text-white px-7 py-2 bg-blue-600 rounded-xl">
                        Intranet
                    </button>
                </li>
            </ul>
        </div>
    </nav>

</header>