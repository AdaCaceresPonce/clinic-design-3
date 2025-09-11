@php
    //Informacion que necesita el sidebar
    $links = [
        [
            //Servicios
            'icon' => 'fa-solid fa-tooth',
            'name' => 'Servicios',
            'route' => route('admin.services.index'),
        ],
        [
            //Especialidades
            'icon' => 'fa-solid fa-briefcase-medical',
            'name' => 'Especialidades',
            'route' => route('admin.specialties.index'),
        ],
        [
            //Profesionales
            'icon' => 'fa-solid fa-user-doctor',
            'name' => 'Profesionales',
            'route' => route('admin.professionals.index'),
        ],

        [
            //Información de la Clínica
            'icon' => 'fa-solid fa-house-chimney-medical',
            'name' => 'Información de la Clínica',
            'route' => route('admin.clinic_information.index'),
        ],
    ];

    $mailbox = [
        [
            //Buzón de consultas
            'icon' => 'fa-solid fa-envelope',
            'name' => 'Consultas',
            'route' => route('admin.inquiries.index'),
        ],

        [
            //Buzón de opinioness
            'icon' => 'fa-solid fa-comments',
            'name' => 'Opiniones',
            'route' => route('admin.opinions.index'),
        ],
    ];

    $web_pages = [
            [
                'icon' => 'fa-solid fa-ranking-star',
                'name' => 'Página Inicio',
                'route' => route('admin.welcome_page_content.index'),
            ],
    
            [
                'icon' => 'fa-solid fa-people-group',
                'name' => 'Página Nosotros',
                'route' => route('admin.about_us_page_content.index'),
            ],
    
            [
                'icon' => 'fa-solid fa-teeth',
                'name' => 'Página Servicios',
                'route' => route('admin.our_services_page_content.index'),
            ],
    
            [
                'icon' => 'fa-solid fa-stethoscope',
                'name' => 'Página Profesionales',
                'route' => route('admin.our_professionals_page_content.index'),
            ],
    
            [
                'icon' => 'fa-solid fa-address-book',
                'name' => 'Página Contacto',
                'route' => route('admin.contact_us_page_content.index'),
            ],
        ];
@endphp

<x-admin-layout title="Dashboard" :breadcrumbs="[
    [
        'name' => 'Dashboard',
    ],
]">

    <div class="mx-auto max-w-[1230px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            {{-- Tarjeta 1 --}}
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    {{-- Foto de perfil del usuario --}}
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                    {{-- Nombre de usuario --}}
                    <div class="ml-4 flex-1">
                        <h2 class="text-lg font-semibold">
                            Bienvenido, {{ auth()->user()->name }}
                        </h2>
                        {{-- Cerrar sesion --}}
                        <button class="text-base hover:text-blue-500" onclick="confirmLogout()">
                            Cerrar sesión
                        </button>
                    </div>
                </div>
            </div>

            {{-- Tarjeta 2 --}}
            <div class="bg-white rounded-lg shadow-lg p-6 flex items-center justify-center">
                <img src="{{ Storage::url($clinicInformation['navbar_clinic_logo']) }}"
                    class="size-14 border border-black me-3 rounded-full">
                <div class="ml-2 flex-1">
                    <h2 class="text-xl font-semibold">
                        Clínica Dental
                    </h2>
                    <a href="{{ route('welcome.index') }}" target="_blank" class="text-base hover:text-blue-500">
                        Visitar Web <i class="ml-1 fa-solid fa-earth-americas"></i>
                    </a>
                </div>


            </div>

        </div>

        <div class="card space-y-6">
            <span class="font-semibold text-xl">¿Qué deseas hacer hoy?</span>

            <div>
                <span class="font-medium">Puedes ver los registros de:</span>
                <div class="mt-3 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
                    @foreach ($links as $link)
                        <a href="{{ $link['route'] }}"
                            class="p-5 flex items-center font-medium bg-emerald-600 text-white shadow-md rounded-lg transition duration-150 hover:scale-105">

                            <span class="inline-flex w-6 h-6 justify-center items-center">
                                <i class="{{ $link['icon'] }}"></i>
                            </span>

                            <span class="ms-3">
                                {{ $link['name'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <span class="font-medium">No olvides revisar con frecuencia el buzón de mensajes de:</span>
                <div class="mt-3 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
                    @foreach ($mailbox as $mailbox_item)
                        <a href="{{ $mailbox_item['route'] }}"
                            class="p-5 flex items-center font-medium bg-sky-500 text-white shadow-md rounded-lg transition duration-150 hover:scale-105">

                            <span class="inline-flex w-6 h-6 justify-center items-center">
                                <i class="{{ $mailbox_item['icon'] }}"></i>
                            </span>

                            <span class="ms-3">
                                {{ $mailbox_item['name'] }}
                            </span>

                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <span class="font-medium">Puedes modificar los contenidos que se muestran en:</span>
                <div class="mt-3 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
                    @foreach ($web_pages as $web_page)
                        <a href="{{ $web_page['route'] }}"
                            class="p-5 flex items-center font-medium bg-indigo-600 text-white shadow-md rounded-lg  transition duration-150 hover:scale-105">

                            <span class="inline-flex w-6 h-6 justify-center items-center">
                                <i class="{{ $web_page['icon'] }}"></i>
                            </span>

                            <span class="ms-3">
                                {{ $web_page['name'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

    @push('js')
        <script>
            //Alerta de confirmar eliminar
            function confirmLogout() {
                Swal.fire({
                    title: "¿Deseas cerrar sesión?",
                    text: "Al hacerlo, saldrás de tu cuenta y necesitarás iniciar sesión otra vez para continuar.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, quiero cerrar sesión!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }

                });

            }
        </script>
    @endpush
</x-admin-layout>
