<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Service;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $services = Service::orderBy('id', 'desc')->get();
        $professionals = Professional::orderBy('id', 'desc')->with('specialties')->get();

        return view('welcome', compact('services', 'professionals'));
    }
}
