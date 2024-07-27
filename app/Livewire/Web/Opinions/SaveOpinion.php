<?php

namespace App\Livewire\Web\Opinions;

use App\Models\Opinion;
use App\Models\Service;
use Livewire\Component;

class SaveOpinion extends Component
{

    //Variable para cargar los Servicios
    public $services;

    public $state = 'Nuevo';

    //Variable para la opinión a guardar
    public $opinion;

    //Funcion para alerta de error en el formulario
    public function boot()
    {
        $this->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => '¡Error!',
                    'text' => 'El formulario contiene errores. Por favor revisa los campos.'
                ]);
            }
        });
    }


    public function mount()
    {
        $this->services = Service::orderBy('id', 'desc')->get();

        $this->opinion= [
            'name' => '',
            'lastname' => '',
            'service_id' => '',
            'opinion' => '',
            'state' => $this->state,
            'is_published' => false,

        ];

    }

    public function save()
    {
        // Validar la entrada del usuario
        $this->validate([
            'opinion.name' => 'required',
            'opinion.lastname' => 'required',
            'opinion.service_id' => 'nullable|exists:services,id',
            'opinion.opinion' => 'required',
            'opinion.state' => 'required',
            'opinion.is_published' => 'required',
        ], [], [
            'opinion.name' => 'nombres',
            'opinion.lastname' => 'apellidos',
            'opinion.service_id' => 'servicio',
            'opinion.opinion' => 'mensaje de opinión',
            'opinion.state' => 'estado de la opinión',
            'opinion.is_published' => 'situación de la opinión',
        ]);

        // Si no se ha seleccionado un servicio, establecer service_id como null
        if (empty($this->opinion['service_id'])) {
            $this->opinion['service_id'] = null;
        }

        // Crear y guardar el Inquiry con los datos correctos
        Opinion::create($this->opinion);

        // Mostrar mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Tu opinión ha sido enviada correctamente',
        ]);

        // Redirigir a la página de contacto
        return redirect()->route('contact_us.index');
    }

    public function render()
    {
        return view('livewire.web.opinions.save-opinion');
    }
}
