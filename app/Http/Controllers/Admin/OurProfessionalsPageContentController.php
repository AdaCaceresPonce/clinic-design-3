<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurProfessionalsPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class OurProfessionalsPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('our_professionals_page.view');

        $contents = OurProfessionalsPageContent::first();

        return view('admin.web_page_contents.our_professionals_page.index', compact('contents'));
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
    public function show(OurProfessionalsPageContent $ourProfessionalsPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurProfessionalsPageContent $ourProfessionalsPageContent)
    {
        Gate::authorize('our_professionals_page.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurProfessionalsPageContent $ourProfessionalsPageContent)
    {
        Gate::authorize('our_professionals_page.update');

        $request->validate([
            'cover_title' => 'required',
            'cover_img' => 'image|max:1024',

            'our_professionals_title' => 'required',
            'our_professionals_description' => 'required',
            'our_professionals_img' => 'image|max:1024',

            'our_professionals_team_title' => 'required',
            'our_professionals_team_description' => 'required',

        ], [
            'cover_title.required' => 'El título de la portada es obligatorio.',
            'cover_img.image' => 'El archivo cargado para la portada debe ser una imagen.',

            'our_professionals_title.required' => 'El título de la sección sobre profesionales es obligatorio.',
            'our_professionals_description.required' => 'La descripción de la sección sobre profesionales es obligatoria.',
            'about_image.image' => 'El archivo cargado para la sección sobre profesionales debe ser una imagen.',

            'our_professionals_team_title.required' => 'El título de la sección de equipo de profesionales es obligatorio.',
            'our_professionals_team_description.required' => 'La descripción de la sección de equipo de profesionales es obligatoria.',

        ]);

        $ourProfessionalsPageContent->update($request->except(['cover_img', 'our_professionals_img']));

        if ($request->hasFile('cover_img')) {
            Storage::delete($ourProfessionalsPageContent->cover_img);
            $ourProfessionalsPageContent->update(['cover_img' => $request->file('cover_img')->store('web_pages_images/our_professionals_page')]);
        }

        if ($request->hasFile('our_professionals_img')) {
            Storage::delete($ourProfessionalsPageContent->our_professionals_img);
            $ourProfessionalsPageContent->update(['our_professionals_img' => $request->file('our_professionals_img')->store('web_pages_images/our_professionals_page')]);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.our_professionals_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurProfessionalsPageContent $ourProfessionalsPageContent)
    {
        //
    }
}
