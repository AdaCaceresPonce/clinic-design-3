<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\ContactUsPageContent;
use Illuminate\Http\Request;
use App\Rules\QuillRequired;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ContactUsPageContentController extends Controller
{
    public function index()
    {
        Gate::authorize('contact_us_page.view');

        $contents = ContactUsPageContent::first();

        return view('admin.web_page_contents.contact_us_page.index', compact('contents'));
    }

    public function edit()
    {
        Gate::authorize('contact_us_page.update');

        $contents = ContactUsPageContent::first();

        return view('admin.web_page_contents.contact_us_page.edit', compact('contents'));
    }

    public function update(Request $request)
    {
        Gate::authorize('contact_us_page.update');

        $contactUsPageContent = ContactUsPageContent::firstOrFail();

        $request->validate([
            'cover_title' => [new QuillRequired()],
            'cover_img' => 'nullable|image|max:1024',

            'contact_us_title' => [new QuillRequired()],
            'contact_us_description' => [new QuillRequired()],
            'contact_us_img' => 'nullable|image|max:1024',

            'opinions_title' => [new QuillRequired()],
            'opinions_description' => [new QuillRequired()],
            'opinions_img' => 'nullable|image|max:1024',

        ], [], [

            'cover_title' => 'título de la portada',
            'cover_img' => 'imagen de la portada',

            'contact_us_title' => 'título de la sección de contacto',
            'contact_us_description' => 'descripción de la sección de contacto',
            'contact_us_img' => 'imagen de la sección de contacto',

            'opinions_title' => 'título de la sección de opiniones',
            'opinions_description' => 'descripción de la sección de opiniones',
            'opinions_img' => 'imagen de la sección opiniones',

        ]);

        $images = ['cover_img', 'contact_us_img', 'opinions_img'];

        $contactUsPageContent->update($request->except($images));

        foreach ($images as $image) {

            if ($request->hasFile($image)) {

                // Eliminar la imagen antigua
                Storage::delete($contactUsPageContent->$image);

                // Almacenar la nueva imagen y actualizar el campo correspondiente en el modelo
                $contactUsPageContent->update([$image => $request->file($image)->store('web_pages_images/contact_us_page')]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.contact_us_page_content.index');
    }
}
