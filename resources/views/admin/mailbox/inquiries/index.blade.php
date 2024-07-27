<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Buzón de consultas',
    ],
]">

    <div class="mx-auto max-w-[1230px]">
        
        <livewire:admin.inquiries.inquiries-table />

    </div>


</x-admin-layout>
