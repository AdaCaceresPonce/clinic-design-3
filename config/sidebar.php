<?php

return [
    [
        'type' => 'link',
        'icon' => 'fa-solid fa-table-columns',
        'title' => 'Dashboard',
        'route' => 'admin.dashboard',
        'active' => 'admin.dashboard',
    ],
    [
        'type' => 'header',
        'title' => 'Administrar página',
    ],
    [
        //Servicios
        'type' => 'link',
        'icon' => 'fa-solid fa-tooth',
        'title' => 'Servicios',
        'route' => 'admin.services.index',
        'active' => 'admin.services.*',
    ],

    [
        //Profesionales
        'type' => 'link',
        'icon' => 'fa-solid fa-user-doctor',
        'title' => 'Profesionales',
        'route' => 'admin.professionals.index',
        'active' => 'admin.professionals.*',
    ],

    [
        //Especialidades
        'type' => 'link',
        'icon' => 'fa-solid fa-briefcase-medical',
        'title' => 'Especialidades',
        'route' => 'admin.specialties.index',
        'active' => 'admin.specialties.*',
    ],

    [
        //Páginas
        'type' => 'group',
        'icon' => 'fa-solid fa-file-lines',
        'title' => 'Páginas',
        'active' => [
            'admin.welcome_page_content.*',
            'admin.about_us_page_content.*',
            'admin.our_services_page_content.*',
            'admin.our_professionals_page_content.*',
            'admin.contact_us_page_content.*',
        ],
        'items' => [
            [
                'type' => 'link',
                'icon' => 'fa-solid fa-ranking-star',
                'title' => 'Inicio',
                'route' => 'admin.welcome_page_content.index',
                'active' => 'admin.welcome_page_content.*',
            ],

            [
                'type' => 'link',
                'icon' => 'fa-solid fa-people-group',
                'title' => 'Nosotros',
                'route' => 'admin.about_us_page_content.index',
                'active' => 'admin.about_us_page_content.*',
            ],

            [
                'type' => 'link',
                'icon' => 'fa-solid fa-teeth',
                'title' => 'Servicios',
                'route' => 'admin.our_services_page_content.index',
                'active' => 'admin.our_services_page_content.*',
            ],

            [
                'type' => 'link',
                'icon' => 'fa-solid fa-stethoscope',
                'title' => 'Profesionales',
                'route' => 'admin.our_professionals_page_content.index',
                'active' => 'admin.our_professionals_page_content.*',
            ],

            [
                'type' => 'link',
                'icon' => 'fa-solid fa-address-book',
                'title' => 'Contacto',
                'route' => 'admin.contact_us_page_content.index',
                'active' => 'admin.contact_us_page_content.*',
            ],
        ],
    ],

    [
        'type' => 'header',
        'title' => 'Buzón',
    ],

    [
        //Buzón de consultas
        'type' => 'link',
        'icon' => 'fa-solid fa-envelope',
        'title' => 'Consultas',
        'route' => 'admin.inquiries.index',
        'active' => 'admin.inquiries.*',
    ],

    [
        //Buzón de opiniones
        'type' => 'link',
        'icon' => 'fa-solid fa-comments',
        'title' => 'Opiniones',
        'route' => 'admin.opinions.index',
        'active' => 'admin.opinions.*',
    ],

    [
        'type' => 'header',
        'title' => 'Configuración',
    ],

    [
        //Usuarios
        'type' => 'link',
        'icon' => 'fa-solid fa-users',
        'title' => 'Usuarios',
        'route' => 'admin.users.index',
        'active' => 'admin.users.*',
    ],

    [
        //Roles
        'type' => 'link',
        'icon' => 'fa-solid fa-user-shield',
        'title' => 'Roles',
        'route' => 'admin.roles.index',
        'active' => 'admin.roles.*',
    ],

    [
        //Información de la Clínica
        'type' => 'link',
        'icon' => 'fa-solid fa-gear',
        'title' => 'Ajustes',
        'route' => 'admin.clinic_information.index',
        'active' => 'admin.clinic_information.*',
    ],
];
