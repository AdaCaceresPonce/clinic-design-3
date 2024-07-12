<?php

namespace App\Livewire\Web\Sliders;

use App\Models\Professional;
use Livewire\Component;

class SliderProfessionals extends Component
{
    public $professionals;

    public function mount(){
        $this->professionals = Professional::orderBy('id', 'desc')->with('specialties')->get();
    }

    public function placeholder(){
        return view('livewire.placeholders.spinner');
    }

    public function render()
    {
        return view('livewire.web.sliders.slider-professionals');
    }
}
