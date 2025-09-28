<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomePageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class WelcomePageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('welcome_page.view');

        $contents = WelcomePageContent::first();

        return view('admin.web_page_contents.welcome_page.index', compact('contents'));
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
    public function show(WelcomePageContent $welcomePageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WelcomePageContent $welcomePageContent)
    {
        Gate::authorize('welcome_page.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WelcomePageContent $welcomePageContent)
    {
        Gate::authorize('welcome_page.update');

        $request->validate([
            'cover_title' => 'required',
            'cover_description' => 'required',
            'cover_img' => 'image|max:1024',

            'about_title' => 'required',
            'about_description' => 'required',
            'about_we_offer_you' => 'required',
            'about_image' => 'image|max:1024',

            'our_services_title' => 'required',
            'our_services_description' => 'required',

            'our_professionals_title' => 'required',
            'our_professionals_description' => 'required',

            'testimonials_title' => 'required',
            'testimonials_description' => 'required',
        ], [
            'cover_title.required' => 'El título de la portada es obligatorio.',
            'cover_description.required' => 'La descripción de la portada es obligatoria.',
            'cover_img.image' => 'El archivo cargado para la portada debe ser una imagen.',

            'about_title.required' => 'El título de detalles de la clinica es obligatorio.',
            'about_description.required' => 'La descripción de detalles de la clinica es obligatoria.',
            'about_we_offer_you.required' => 'La lista de lo que ofrece la clínica debe contener al menos 1 elemento.',
            'about_image.image' => 'El archivo cargado para detalles de la clínica debe ser una imagen.',

            'our_services_title.required' => 'El título de la sección de servicios es obligatorio.',
            'our_services_description.required' => 'La descripción de la sección de servicios es obligatoria.',

            'our_professionals_title.required' => 'El título de la sección de profesionales es obligatorio.',
            'our_professionals_description.required' => 'La descripción de la sección de profesionales es obligatoria.',

            'testimonials_title.required' => 'El título de la sección de opiniones es obligatorio.',
            'testimonials_description.required' => 'La descripción de la sección de opiniones es obligatoria.',

        ]);


        $welcomePageContent->update($request->except(['cover_img', 'about_image']));

        if ($request->hasFile('cover_img')) {
            Storage::delete($welcomePageContent->cover_img);
            $welcomePageContent->update(['cover_img' => $request->file('cover_img')->store('web_pages_images/welcome_page')]);
        }

        if ($request->hasFile('about_image')) {
            Storage::delete($welcomePageContent->about_image);
            $welcomePageContent->update(['about_image' => $request->file('about_image')->store('web_pages_images/welcome_page')]);
        }


        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.welcome_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WelcomePageContent $welcomePageContent)
    {
        //
    }
}
