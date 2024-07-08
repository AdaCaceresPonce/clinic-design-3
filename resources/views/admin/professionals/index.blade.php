<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Profesionales',
    ],
]">

    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.professionals.create') }}">
            Nuevo
        </a>
    </x-slot>

    <div class="mx-auto max-w-[1230px]">
        
        <livewire:admin.professionals.professionals-list />
    
    </div>


</x-admin-layout>
