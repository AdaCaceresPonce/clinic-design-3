<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\WelcomePageContent;
use App\Rules\QuillRequired;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class WelcomePageContentController extends Controller
{
    public function index()
    {
        Gate::authorize('welcome_page.view');

        $contents = WelcomePageContent::first();

        return view('admin.web_page_contents.welcome_page.index', compact('contents'));
    }

    public function edit()
    {
        Gate::authorize('welcome_page.update');

        $contents = WelcomePageContent::first();

        return view('admin.web_page_contents.welcome_page.edit', compact('contents'));
    }

    public function update(Request $request)
    {
        Gate::authorize('welcome_page.update');

        $welcomePageContent = WelcomePageContent::firstOrFail();

        $request->validate([
            'cover_title' => [new QuillRequired()],
            'cover_description' => [new QuillRequired()],
            'cover_img' => 'image|max:1024',

            'about_title' => [new QuillRequired()],
            'about_description' => [new QuillRequired()],
            'about_we_offer_you' => 'required',
            'about_image' => 'image|max:1024',

            'our_services_title' => [new QuillRequired()],
            'our_services_description' => [new QuillRequired()],

            'our_professionals_title' => [new QuillRequired()],
            'our_professionals_description' => [new QuillRequired()],

            'testimonials_title' => [new QuillRequired()],
            'testimonials_description' => [new QuillRequired()],
        ], [

            'cover_img.image' => 'El archivo cargado para la portada debe ser una imagen.',

            'about_we_offer_you.required' => 'La lista de lo que ofrece la clínica debe contener al menos 1 elemento.',
            'about_image.image' => 'El archivo cargado para detalles de la clínica debe ser una imagen.',

        ], [
            'cover_title' => 'título de la portada',
            'cover_description' => 'descripción de la portada',

            'about_title' => 'título de detalles de la clinica',
            'about_description' => 'descripción de detalles de la clinica',

            'our_services_title' => 'título de la sección de servicios',
            'our_services_description' => 'descripción de la sección de servicios',

            'our_professionals_title' => 'título de la sección de profesionales',
            'our_professionals_description' => 'descripción de la sección de profesionales',

            'testimonials_title' => 'título de la sección de opiniones',
            'testimonials_description' => 'descripción de la sección de opiniones',
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
}
