<?php

namespace App\View\Components;

use App\Models\ClinicInformation;
use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactSection extends Component
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
        $clinic_information = ClinicInformation::first();
        $services = Service::orderBy('id', 'desc')->get();

        return view('layouts.partials.app.contact-section', compact('clinic_information', 'services'));
    }
}
