@php
    $links = [
        [
            'icon' => 'fa-solid fa-table-columns',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Administrar página',
        ],
        [
            //Servicios
            'icon' => 'fa-solid fa-tooth',
            'name' => 'Servicios',
            'route' => route('admin.services.index'),
            'active' => request()->routeIs('admin.services.*'),
        ],

        [
            //Profesionales
            'icon' => 'fa-solid fa-user-doctor',
            'name' => 'Profesionales',
            'route' => route('admin.professionals.index'),
            'active' => request()->routeIs('admin.professionals.*'),
        ],

        [
            //Especialidades
            'icon' => 'fa-solid fa-briefcase-medical',
            'name' => 'Especialidades',
            'route' => route('admin.specialties.index'),
            'active' => request()->routeIs('admin.specialties.*'),
        ],

        [
            //Información de la Clínica
            'icon' => 'fa-solid fa-house-chimney-medical',
            'name' => 'Información',
            'route' => route('admin.clinic_information.index'),
            'active' => request()->routeIs('admin.clinic_information.*'),
        ],

        // [
        //     'header' => 'Páginas',
        // ],
        [
            'icon' => 'fa-solid fa-file-lines',
            'name' => 'Páginas',
            'route' => route('admin.welcome_page_content.index'),
            'active' => request()->routeIs([
                'admin.welcome_page_content.*',
                'admin.about_us_page_content.*',
                'admin.our_services_page_content.*',
                'admin.our_professionals_page_content.*',
                'admin.contact_us_page_content.*',
            ]),
            'submenu' => [
                [
                    'icon' => 'fa-solid fa-ranking-star',
                    'name' => 'Inicio',
                    'route' => route('admin.welcome_page_content.index'),
                    'active' => request()->routeIs('admin.welcome_page_content.*'),
                ],

                [
                    'icon' => 'fa-solid fa-people-group',
                    'name' => 'Nosotros',
                    'route' => route('admin.about_us_page_content.index'),
                    'active' => request()->routeIs('admin.about_us_page_content.*'),
                ],

                [
                    'icon' => 'fa-solid fa-teeth',
                    'name' => 'Servicios',
                    'route' => route('admin.our_services_page_content.index'),
                    'active' => request()->routeIs('admin.our_services_page_content.*'),
                ],

                [
                    'icon' => 'fa-solid fa-stethoscope',
                    'name' => 'Profesionales',
                    'route' => route('admin.our_professionals_page_content.index'),
                    'active' => request()->routeIs('admin.our_professionals_page_content.*'),
                ],

                [
                    'icon' => 'fa-solid fa-address-book',
                    'name' => 'Contacto',
                    'route' => route('admin.contact_us_page_content.index'),
                    'active' => request()->routeIs('admin.contact_us_page_content.*'),
                ],
            ],
        ],

        [
            'header' => 'Buzón',
        ],

        [
            //Buzón de consultas
            'icon' => 'fa-solid fa-envelope',
            'name' => 'Consultas',
            'route' => route('admin.inquiries.index'),
            'active' => request()->routeIs('admin.inquiries.*'),
        ],

        [
            //Buzón de opiniones
            'icon' => 'fa-solid fa-comments',
            'name' => 'Opiniones',
            'route' => route('admin.opinions.index'),
            'active' => request()->routeIs('admin.opinions.*'),
        ],

        [
            'header' => 'Configuración',
        ],

        [
            //Usuarios
            'icon' => 'fa-solid fa-users',
            'name' => 'Usuarios',
            'route' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
        ],

        [
            //Roles
            'icon' => 'fa-solid fa-user-shield',
            'name' => 'Roles',
            'route' => route('admin.opinions.index'),
            'active' => request()->routeIs('admin.opinions.*'),
        ],

        [
            //Permisos
            'icon' => 'fa-solid fa-user-lock',
            'name' => 'Permisos',
            'route' => route('admin.opinions.index'),
            'active' => request()->routeIs('admin.opinions.*'),
        ],
    ];

    // $web_pages = [
    //     [
    //         'icon' => 'fa-solid fa-ranking-star',
    //         'name' => 'Página Inicio',
    //         'route' => route('admin.welcome_page_content.index'),
    //         'active' => request()->routeIs('admin.welcome_page_content.*'),
    //     ],

    //     [
    //         'icon' => 'fa-solid fa-people-group',
    //         'name' => 'Página Nosotros',
    //         'route' => route('admin.about_us_page_content.index'),
    //         'active' => request()->routeIs('admin.about_us_page_content.*'),
    //     ],

    //     [
    //         'icon' => 'fa-solid fa-teeth',
    //         'name' => 'Página Servicios',
    //         'route' => route('admin.our_services_page_content.index'),
    //         'active' => request()->routeIs('admin.our_services_page_content.*'),
    //     ],

    //     [
    //         'icon' => 'fa-solid fa-stethoscope',
    //         'name' => 'Página Profesionales',
    //         'route' => route('admin.our_professionals_page_content.index'),
    //         'active' => request()->routeIs('admin.our_professionals_page_content.*'),
    //     ],

    //     [
    //         'icon' => 'fa-solid fa-address-book',
    //         'name' => 'Página Contacto',
    //         'route' => route('admin.contact_us_page_content.index'),
    //         'active' => request()->routeIs('admin.contact_us_page_content.*'),
    //     ],
    // ];

@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="pb-4 space-y-2 font-medium">


            @foreach ($links as $link)
                <li>
                    {{-- Si está definido el campo header, se muestra como cabecera, usualmente tendrá solo ese campo --}}
                    @isset($link['header'])
                        <div class="px-2 py-2 text-sm font-semibold text-gray-400 uppercase">
                            {{ $link['header'] }}
                        </div>

                        {{-- Si no tiene cabecera, quiere decir que es un enlace de sidebar --}}
                    @else
                        {{-- Si está definido el campo submenú con todos sus elementos, se muestra el enlace del sidebar con ese diseño --}}
                        @isset($link['submenu'])
                            <div x-data="{
                                open: {{ $link['active'] ? 'true' : 'false' }}
                            }">

                                {{-- Botón --}}
                                <button @click="open = !open"
                                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                                    <span class="inline-flex w-6 h-6 justify-center items-center">
                                        <i class="{{ $link['icon'] }}"></i>
                                    </span>

                                    <span
                                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $link['name'] }}</span>

                                    <svg :class="{ 'rotate-180': open }" class="w-3 h-3 transition-transform" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                {{-- Submenu --}}
                                <ul x-show="open" x-cloak x-collapse class="py-2 space-y-2">

                                    @foreach ($link['submenu'] as $item)
                                        <li>
                                            <a href="{{ $item['route'] }}"
                                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ $item['active'] ? ' bg-gray-100 dark:bg-gray-700' : '' }}">
                                                <span class="inline-flex w-6 h-6 justify-center items-center">
                                                    <i class="fa-regular fa-circle"></i>
                                                </span>
                                                <span class="ms-2">
                                                    {{ $item['name'] }}

                                                </span>
                                            </a>
                                        </li>
                                    @endforeach


                                </ul>

                            </div>

                            {{-- Sino, se muestra el enlace del sidebar normal --}}
                        @else
                            <a href="{{ $link['route'] }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? ' bg-gray-100 dark:bg-gray-700' : '' }}">
                                <span class="inline-flex w-6 h-6 justify-center items-center">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="ms-2">
                                    {{ $link['name'] }}
                                </span>
                            </a>
                        @endisset
                    @endisset

                </li>
            @endforeach

        </ul>
        <ul class="pt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            {{-- @foreach ($web_pages as $web_page)
                <li>
                    <a href="{{ $web_page['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $web_page['active'] ? ' bg-gray-100 dark:bg-gray-700' : '' }}">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $web_page['icon'] }}"></i>
                        </span>
                        <span class="ms-2">
                            {{ $web_page['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach --}}


        </ul>
    </div>
</aside>
