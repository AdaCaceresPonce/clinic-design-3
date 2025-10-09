<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Nosotros',
        'route' => route('admin.about_us_page_content.index'),
    ],
    [
        'name' => 'Editar contenido',
    ],
]">

</x-admin-layout>