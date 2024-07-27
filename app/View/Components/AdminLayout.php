<?php

namespace App\View\Components;

use App\Models\ClinicInformation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $clinicInformation = ClinicInformation::first();
        
        return view('layouts.admin', compact('clinicInformation'));
    }
}
