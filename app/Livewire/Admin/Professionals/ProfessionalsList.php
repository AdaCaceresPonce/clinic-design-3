<?php

namespace App\Livewire\Admin\Professionals;

use App\Models\Professional;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProfessionalsList extends Component
{

    use WithPagination;

    #[Url(as: 's')]
    public $search = '';


    public function resetSearch()
    {
        $this->search = '';
    }

    //Resetea la paginacion cada que se hace una busqueda, así se evitas que si haces una busqueda desde una pagina que no sea la primera y no hay suficientes parametros que llenen esa primera pagina ya no muestre la alerta de no registros
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $professionals = Professional::orderBy('id', 'desc')
            ->with(['specialties'])
            ->when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('specialties', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            })
            ->paginate(8);
        return view('livewire.admin.professionals.professionals-list', compact('professionals'));
    }
}
