<?php

namespace App\Livewire\Web\Sliders;

use App\Models\Service;
use Livewire\Component;

class SliderServices extends Component
{

    public $services;

    public function mount(){
        $this->services = Service::orderBy('id', 'desc')->get();
    }

    public function placeholder(){
        return view('livewire.placeholders.spinner');
    }
    
    public function render()
    {
        return view('livewire.web.sliders.slider-services');
    }
}
