<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    public function index(){

        $services = Service::orderBy('id', 'desc')->paginate(9);
        return view('web.our_service',compact('services'));
        
    } 
}
