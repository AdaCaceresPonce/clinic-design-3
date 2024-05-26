<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsPageContent;
use Illuminate\Http\Request;

class AboutUsPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = AboutUsPageContent::first();

        return view('admin.web_page_contents.about_us_page.index', compact('contents'));
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
    public function show(AboutUsPageContent $aboutUsPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUsPageContent $aboutUsPageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUsPageContent $aboutUsPageContent)
    {
        $request->validate([

            'cover_title' => 'required',
            'cover_img' => 'image|max:1024',

            'about_us_title' => 'required',
            'about_us_description' => 'required',
            'about_us_img' => 'image|max:1024',

            'free_title_1' => 'required',
            'free_description_1' => 'required',
            'free_title_2' => 'required',
            'free_description_2' => 'required',
            'free_img' => 'image|max:1024',

        ],[
            'cover_title.required' => 'El título de la portada es obligatorio.',
            'cover_img.image' => 'El archivo cargado para la portada debe ser una imagen.',

            'about_us_title.required' => 'El título sobre la clinica es obligatorio.',
            'about_us_description.required' => 'La descripción sobre la clinica es obligatoria.',
            'about_us_img.image' => 'El archivo cargado sobre la clínica debe ser una imagen.',

            'free_title_1.required' => 'El título libre 1 es obligatorio.',
            'free_description_1.required' => 'La descripción libre 1 es obligatoria.',
            'free_title_2.required' => 'El título libre 2 es obligatorio.',
            'free_description_2.required' => 'La descripción libre 2 es obligatoria.',
            'free_img.image' => 'El archivo cargado en sección libre debe ser una imagen.',

        ]);

        $aboutUsPageContent->update($request->except(['cover_img', 'about_us_image', 'free_img']));

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.about_us_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUsPageContent $aboutUsPageContent)
    {
        //
    }
}
