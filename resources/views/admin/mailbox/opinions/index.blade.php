<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Buzón de Opiniones',
    ],
]">

    <div class="mx-auto max-w-[1230px]">
        
        <livewire:admin.opinions.opinions-table />

    </div>


</x-admin-layout>
