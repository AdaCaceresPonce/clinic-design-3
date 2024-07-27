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

    <div class="mx-auto max-w-[1230px]">

        <div class="inline-flex w-full justify-center mb-3">
            <a href="{{ route('our_services.index') }}" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded-md">Ver página Servicios</a>
        </div>

        <livewire:admin.services.services-list />

    </div>


</x-admin-layout>
