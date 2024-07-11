<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OurServicesPageContent;
use App\Models\Service;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    public function index(){

        $services = Service::orderBy('id', 'desc')->paginate(6);
        $contents = OurServicesPageContent::first();
        return view('web.our_service',compact('services', 'contents'));
        
    }

    public function show_service(Service $service){

        return view('web.service_details', compact('service'));
    }
}
