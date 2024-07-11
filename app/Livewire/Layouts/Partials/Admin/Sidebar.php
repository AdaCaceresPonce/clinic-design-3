<?php

namespace App\Livewire\Layouts\Partials\Admin;

use App\Models\Inquiry;
use Livewire\Component;

class Sidebar extends Component
{
    public $new_inquiries_count;

    public $dashboard;
    public $links;
    public $inquiries_mailbox;
    public $web_pages;

    public function mount()
    {
        $this->refreshInquiriesCount();

        $this->dashboard = [
            'icon' => 'fa-solid fa-table-columns',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ];
        //Informacion que necesita el sidebar
        $this->links = [
            [
                //Servicios
                'icon' => 'fa-solid fa-tooth',
                'name' => 'Servicios',
                'route' => route('admin.services.index'),
                'active' => request()->routeIs('admin.services.*'),
            ],
            [
                //Especialidades
                'icon' => 'fa-solid fa-briefcase-medical',
                'name' => 'Especialidades',
                'route' => route('admin.specialties.index'),
                'active' => request()->routeIs('admin.specialties.*'),
            ],
            [
                //Profesionales
                'icon' => 'fa-solid fa-user-doctor',
                'name' => 'Profesionales',
                'route' => route('admin.professionals.index'),
                'active' => request()->routeIs('admin.professionals.*'),
            ],

            [
                //Información de la Clínica
                'icon' => 'fa-solid fa-house-chimney-medical',
                'name' => 'Información de la Clínica',
                'route' => route('admin.clinic_information.index'),
                'active' => request()->routeIs('admin.clinic_information.*'),
            ],
        ];

        $this->inquiries_mailbox = [
            //Buzón de consultas
            'icon' => 'fa-solid fa-envelope',
            'name' => 'Consultas',
            'route' => route('admin.inquiries.index'),
            'active' => request()->routeIs('admin.inquiries.*'),
        ];

        $this->web_pages = [
            [
                'icon' => 'fa-solid fa-ranking-star',
                'name' => 'Página Inicio',
                'route' => route('admin.welcome_page_content.index'),
                'active' => request()->routeIs('admin.welcome_page_content.*'),
            ],

            [
                'icon' => 'fa-solid fa-people-group',
                'name' => 'Página Nosotros',
                'route' => route('admin.about_us_page_content.index'),
                'active' => request()->routeIs('admin.about_us_page_content.*'),
            ],

            [
                'icon' => 'fa-solid fa-teeth',
                'name' => 'Página Servicios',
                'route' => route('admin.our_services_page_content.index'),
                'active' => request()->routeIs('admin.our_services_page_content.*'),
            ],

            [
                'icon' => 'fa-solid fa-stethoscope',
                'name' => 'Página Profesionales',
                'route' => route('admin.our_professionals_page_content.index'),
                'active' => request()->routeIs('admin.our_professionals_page_content.*'),
            ],

            [
                'icon' => 'fa-solid fa-address-book',
                'name' => 'Página Contacto',
                'route' => route('admin.contact_us_page_content.index'),
                'active' => request()->routeIs('admin.contact_us_page_content.*'),
            ],
        ];
    }

    public function refreshInquiriesCount()
    {

        $this->new_inquiries_count = Inquiry::where('state', 'Nuevo')->count();
    }

    public function render()
    {
        return view('livewire.layouts.partials.admin.sidebar');
    }
}
