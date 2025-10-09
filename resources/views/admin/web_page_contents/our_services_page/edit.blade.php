<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Servicios',
        'route' => route('admin.our_services_page_content.index'),
    ],
    [
        'name' => 'Editar contenido',
    ],
]">

</x-admin-layout>