<?php

namespace App\Livewire\Web\Sliders;

use App\Models\Opinion;
use Livewire\Component;

class SliderOpinions extends Component
{

    public $opinions;

    public function mount(){
        $this->opinions = Opinion::all();
    }

    public function placeholder(){
        return view('livewire.placeholders.spinner');
    }

    public function render()
    {
        return view('livewire.web.sliders.slider-opinions');
    }
}
