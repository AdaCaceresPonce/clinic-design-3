<?php

namespace App\Livewire\Web\Inquiries;

use App\Models\Inquiry;
use App\Models\Service;
use Livewire\Component;

class SaveInquiry extends Component
{
    //Variable que contiene el slug del servicio si es que se accedió al formulario desde su pagina de detalles de servicio
    public $service_selected;

    //Variable para cargar los Servicios
    public $services;

    public $state = 'Nuevo';

    //Variable para la consulta a guardar
    public $inquiry;

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

        $this->inquiry = [
            'name' => '',
            'lastname' => '',
            'service_id' => '',
            'contact_number' => '',
            'message' => '',
            'state' => $this->state,
        ];

        if ($this->service_selected) {
            $service_data = Service::where('slug', $this->service_selected)->first();
            if ($service_data) {
                $this->inquiry['service_id'] = $service_data->id;
            }
        }
    }

    public function save()
    {
        // Validar la entrada del usuario
        $this->validate([
            'inquiry.name' => 'required',
            'inquiry.lastname' => 'required',
            'inquiry.service_id' => 'nullable|exists:services,id',
            'inquiry.contact_number' => 'required|numeric',
            'inquiry.message' => 'required',
            'inquiry.state' => 'required',
        ], [], [
            'inquiry.name' => 'nombres',
            'inquiry.lastname' => 'apellidos',
            'inquiry.service_id' => 'servicio',
            'inquiry.contact_number' => 'número de contacto',
            'inquiry.message' => 'mensaje de consulta',
            'inquiry.state' => 'estado de la consulta',
        ]);

        // Si no se ha seleccionado un servicio, establecer service_id como null
        if (empty($this->inquiry['service_id'])) {
            $this->inquiry['service_id'] = null;
        }

        // Crear y guardar el Inquiry con los datos correctos
        Inquiry::create($this->inquiry);

        // Mostrar mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Tu consulta ha sido enviada correctamente',
        ]);

        // Redirigir a la página de contacto
        return redirect()->route('contact_us.index');
    }

    public function render()
    {
        return view('livewire.web.inquiries.save-inquiry');
    }
}
