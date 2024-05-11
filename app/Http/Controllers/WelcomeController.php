<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Service;
use App\Models\WelcomePageContent;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $services = Service::orderBy('id', 'desc')->get();
        $professionals = Professional::orderBy('id', 'desc')->with('specialties')->get();
        
        $contents = WelcomePageContent::first();
        
        return view('welcome', compact('services', 'professionals', 'contents'));
    }
}
