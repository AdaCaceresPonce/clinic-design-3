<?php

namespace App\Livewire\Admin\Opinions;

use App\Models\Opinion;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class OpinionsTable extends Component
{

    use WithPagination;

    public $search;

    public $bgColor = "";

    public $opinionEditId = '';

    public $open = false;

    public $opinionInfo = [
        'name' => '',
        'lastname' => '',
        'service' => '',
        'opinion' => '',
        'state' => '',
        'is_published' => false,
        'created_at' => null,
    ];

    public $states = [
        [
            'name' => 'Nuevo',
            'style' => 'new-state',
        ],
        [
            'name' => 'Revisado',
            'style' => 'attended-state',
        ]
    ];



    public function resetSearch()
    {
        $this->search = '';
    }

    
    public function show($opinionId)
    {
        $this->open = true;

        //Variable que guarda el ID para la funcion update
        $this->opinionEditId = $opinionId;

        //Buscamos la consulta con el ID recibido, pero cargando tambien las relaciones definidas en el modelo
        $opinion = Opinion::with('service')->find($opinionId);

        $this->opinionInfo['name'] = $opinion->name;
        $this->opinionInfo['lastname'] = $opinion->lastname;
        $this->opinionInfo['service'] = $opinion->service ? $opinion->service->name : 'Ninguno seleccionado';
        $this->opinionInfo['opinion'] = $opinion->opinion;
        $this->opinionInfo['state'] = $opinion->state;
        $this->opinionInfo['is_published'] = (bool) $opinion->is_published;
        $this->opinionInfo['created_at'] = $opinion->created_at ? Carbon::parse($opinion->created_at) : null;

    }

    public function update()
    {

        $opinion = Opinion::with('service')->find($this->opinionEditId);

        $opinion->update([
            'state' => $this->opinionInfo['state'],
            'is_published' => $this->opinionInfo['is_published'],
        ]);

        // $this->reset(['inquiryEditId', 'inquiryInfo', 'open']);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Estado de la opinión cambiado correctamente.'
        ]);
    }

    #[On('destroy')] 
    public function destroy()
    {
        // Lógica para eliminar la consulta
        $inquiry = Opinion::with('service')->find($this->opinionEditId);

        $inquiry->delete();

        $this->reset(['opinionEditId', 'opinionInfo', 'open']);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Opinión eliminada correctamente.'
        ]);

    }

    //Define los colores de las marcas de tiempo
    public function getBgColor($createdAt)
    {
        if ($createdAt) {
            $createdAt = Carbon::parse($createdAt);
            $diffInHours = $createdAt->diffInHours(now());

            if ($diffInHours < 4) {
                return 'time-blue';
            } elseif ($diffInHours < 12) {
                return 'time-indigo';
            } else {
                return 'time-gray';
            }
        } else {
            return 'time-gray';
        }
    }
    
    public function render()
    {

        $opinions = Opinion::orderBy('id', 'desc')
            ->with(['service'])
            ->when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('lastname', 'like', '%' . $search . '%')
                    ->orWhere('state', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.opinions.opinions-table', compact('opinions'));
    }
}
