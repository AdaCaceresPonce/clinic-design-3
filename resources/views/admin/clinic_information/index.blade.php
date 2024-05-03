<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Información de la Clínica',
    ],
]">

    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.specialties.create') }}">
            Nuevo
        </a>
    </x-slot>

</x-admin-layout>