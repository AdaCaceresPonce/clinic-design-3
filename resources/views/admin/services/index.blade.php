<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Servicios',
    ],
]">

    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.services.create') }}">
            Nuevo
        </a>
    </x-slot>



    @if ($services->count())

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($services as $service)
                <div
                    class="max-w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ Storage::url($service->card_image_path) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-4 text-xs sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $service->name }}
                            </h5>
                        </a>
                        <a href="{{ route('admin.services.edit', $service) }}"
                            class="inline-flex items-center px-2 py-1.5 sm:px-3 sm:py-2 text-xs sm:text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-600 dark:focus:ring-yellow-300">
                            Editar
                            <i class="fa-solid fa-pen-to-square ml-2"></i>
                            {{-- <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg> --}}
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        {{-- Alerta que se muestra cuando no hay servicios registrados --}}
        <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!</span> Todavía no hay servicios registrados.
            </div>
        </div>
    @endif



</x-admin-layout>
