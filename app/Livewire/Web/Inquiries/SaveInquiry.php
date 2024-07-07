<?php

namespace App\Livewire\Web\Inquiries;

use App\Models\Inquiry;
use App\Models\Service;
use Livewire\Component;

class SaveInquiry extends Component
{
    //Variable que contiene el id del servicio si es que se accedió al formulario desde su pagina de detalles de servicio
    public $service_id_received;

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

    public function mount(){

        //Cargar los servicios
        $this->services = Service::orderBy('id', 'desc')->get();

        // Inicializa los campos del array que contendrá la información de la consulta del usuario
        $this->inquiry = [
            'name' => '',
            'lastname' => '',
            'service_id' => '', // Inicializado como cadena vacía
            'contact_number' => '',
            'message' => '',
            'state' => $this->state,
        ];

        // Comprobar si la variable service_id_received no es una cadena vacía
        if (!empty($this->service_id_received)) {
            
            // Buscar el servicio con el id recibido
            $service_data = Service::find($this->service_id_received);

            if ($service_data) {
                // Establecer el service_id de la consulta
                $this->inquiry['service_id'] = $this->service_id_received;
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
