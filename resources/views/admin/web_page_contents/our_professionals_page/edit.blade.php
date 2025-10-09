<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Profesionales',
        'route' => route('admin.our_professionals_page_content.index'),
    ],
    [
        'name' => 'Editar contenido',
    ],
]">

</x-admin-layout>