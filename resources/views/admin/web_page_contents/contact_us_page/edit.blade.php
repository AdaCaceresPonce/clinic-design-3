<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Contacto',
        'route' => route('admin.contact_us_page_content.index'),
    ],
    [
        'name' => 'Editar contenido',
    ],
]">

</x-admin-layout>