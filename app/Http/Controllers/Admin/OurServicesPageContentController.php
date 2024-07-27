<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurServicesPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurServicesPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = OurServicesPageContent::first();

        return view('admin.web_page_contents.our_services_page.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OurServicesPageContent $ourServicesPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurServicesPageContent $ourServicesPageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurServicesPageContent $ourServicesPageContent)
    {
        $request->validate([
            'cover_title' => 'required',
            'cover_img' => 'image|max:1024',

            'our_services_title' => 'required',
            'our_services_description' => 'required',
            'our_services_img' => 'image|max:1024',

            'services_we_offer_title' => 'required',
            'services_we_offer_description' => 'required',

        ], [] , [
            'cover_title' => 'título de la portada',
            'cover_img' => 'imagen de la portada',

            'our_services_title' => 'título de la sección sobre servicios',
            'our_services_description' => 'descripción de la sección sobre servicios',
            'our_services_img' => 'imagen de la sección sobre servicios',

            'services_we_offer_title' => 'título del listado de servicios',
            'services_we_offer_description' => 'descripción del listado de servicios',

        ]);

        $images = ['cover_img', 'our_services_img' ];

        $ourServicesPageContent->update($request->except($images));

        foreach ($images as $image) {
            
            if ($request->hasFile($image)) {

                // Eliminar la imagen antigua
                Storage::delete($ourServicesPageContent->$image);
        
                // Almacenar la nueva imagen y actualizar el campo correspondiente en el modelo
                $ourServicesPageContent->update([$image => $request->file($image)->store('web_pages_images/our_services_page')]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.our_services_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurServicesPageContent $ourServicesPageContent)
    {
        //
    }
}
