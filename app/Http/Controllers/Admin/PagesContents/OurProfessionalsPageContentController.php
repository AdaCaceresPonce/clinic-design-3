<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\OurProfessionalsPageContent;
use Illuminate\Http\Request;
use App\Rules\QuillRequired;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class OurProfessionalsPageContentController extends Controller
{
    public function index()
    {
        Gate::authorize('our_professionals_page.view');

        $contents = OurProfessionalsPageContent::first();

        return view('admin.web_page_contents.our_professionals_page.index', compact('contents'));
    }

    public function edit()
    {
        Gate::authorize('our_professionals_page.update');

        $contents = OurProfessionalsPageContent::first();

        return view('admin.web_page_contents.our_professionals_page.edit', compact('contents'));
    }

    public function update(Request $request)
    {
        Gate::authorize('our_professionals_page.update');

        $ourProfessionalsPageContent = OurProfessionalsPageContent::firstOrFail();

        $request->validate(
            [
                'cover_title' => [new QuillRequired()],
                'cover_img' => 'nullable|image|max:1024',

                'our_professionals_title' => [new QuillRequired()],
                'our_professionals_description' => [new QuillRequired()],
                'our_professionals_img' => 'nullable|image|max:1024',

                'our_professionals_team_title' => [new QuillRequired()],
                'our_professionals_team_description' => [new QuillRequired()],

            ],
            [
                'cover_img.image' => 'El archivo cargado para la portada debe ser una imagen.',

                'about_image.image' => 'El archivo cargado para la sección sobre profesionales debe ser una imagen.',
            ],
            [
                'cover_title' => 'título de la portada',

                'our_professionals_title' => 'título de la sección sobre profesionales',
                'our_professionals_description' => 'descripción de la sección sobre profesionales',

                'our_professionals_team_title' => 'título de la sección de equipo de profesionales',
                'our_professionals_team_description' => 'descripción de la sección de equipo de profesionales',

            ]
        );

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
}
