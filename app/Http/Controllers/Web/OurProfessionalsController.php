<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OurProfessionalsPageContent;
use App\Models\Professional;
use Illuminate\Http\Request;

class OurProfessionalsController extends Controller
{
    public function index(){

        $contents = OurProfessionalsPageContent::first();
        
        $professionals = Professional::orderBy('id', 'desc')->with('specialties')->paginate(4);

        return view('web.our_professionals', compact('professionals', 'contents'));
    }
}
