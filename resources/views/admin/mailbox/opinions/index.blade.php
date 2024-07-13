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

        <div class="inline-flex w-full justify-center mb-3">
            <a href="{{ route('welcome.index') }}#testimonials" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded-md">Ver Opiniones listadas</a>
        </div>

        <livewire:admin.opinions.opinions-table />

    </div>


</x-admin-layout>
