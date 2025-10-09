<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\OurServicesPageContent;
use Illuminate\Http\Request;
use App\Rules\QuillRequired;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class OurServicesPageContentController extends Controller
{
    public function index()
    {
        Gate::authorize('our_services_page.view');

        $contents = OurServicesPageContent::first();

        return view('admin.web_page_contents.our_services_page.index', compact('contents'));
    }

    public function edit()
    {
        Gate::authorize('our_services_page.update');

        $contents = OurServicesPageContent::first();

        return view('admin.web_page_contents.our_services_page.edit', compact('contents'));
    }

    public function update(Request $request)
    {
        Gate::authorize('our_services_page.update');
        
        $ourServicesPageContent = OurServicesPageContent::firstOrFail();

        $request->validate([
            'cover_title' => [new QuillRequired()],
            'cover_img' => 'nullable|image|max:1024',

            'our_services_title' => [new QuillRequired()],
            'our_services_description' => [new QuillRequired()],
            'our_services_img' => 'nullable|image|max:1024',

            'services_we_offer_title' => [new QuillRequired()],
            'services_we_offer_description' => [new QuillRequired()],

        ], [], [
            'cover_title' => 'título de la portada',
            'cover_img' => 'imagen de la portada',

            'our_services_title' => 'título de la sección sobre servicios',
            'our_services_description' => 'descripción de la sección sobre servicios',
            'our_services_img' => 'imagen de la sección sobre servicios',

            'services_we_offer_title' => 'título del listado de servicios',
            'services_we_offer_description' => 'descripción del listado de servicios',

        ]);

        $images = ['cover_img', 'our_services_img'];

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
}
