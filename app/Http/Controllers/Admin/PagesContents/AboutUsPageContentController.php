<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\AboutUsPageContent;
use Illuminate\Http\Request;
use App\Rules\QuillRequired;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AboutUsPageContentController extends Controller
{
    public function index()
    {
        Gate::authorize('about_us_page.view');

        $contents = AboutUsPageContent::first();

        return view('admin.web_page_contents.about_us_page.index', compact('contents'));
    }

    public function edit()
    {
        Gate::authorize('about_us_page.update');

        $contents = AboutUsPageContent::first();

        return view('admin.web_page_contents.about_us_page.edit', compact('contents'));
    }

    public function update(Request $request)
    {

        Gate::authorize('about_us_page.update');

        $aboutUsPageContent = AboutUsPageContent::firstOrFail();

        $request->validate(
            [

                'cover_title' => [new QuillRequired()],
                'cover_img' => 'nullable|image|max:1024',

                'about_us_title' => [new QuillRequired()],
                'about_us_description' => [new QuillRequired()],
                'about_us_img' => 'nullable|image|max:1024',

                'free_title_1' => [new QuillRequired()],
                'free_description_1' => [new QuillRequired()],
                'free_title_2' => [new QuillRequired()],
                'free_description_2' => [new QuillRequired()],
                'free_img' => 'nullable|image|max:1024',

            ],
            [
                'cover_img.image' => 'El archivo cargado para la portada debe ser una imagen.',

                'about_us_img.image' => 'El archivo cargado sobre la clínica debe ser una imagen.',

                'free_img.image' => 'El archivo cargado en sección libre debe ser una imagen.',
            ],
            [
                'cover_title' => 'título de la portada',

                'about_us_title' => 'título sobre la clinica',
                'about_us_description' => 'descripción sobre la clinica',

                'free_title_1' => 'título libre 1',
                'free_description_1' => 'descripción libre 1',
                'free_title_2' => 'título libre 2',
                'free_description_2' => 'descripción libre 2',
            ]
        );

        $aboutUsPageContent->update($request->except(['cover_img', 'about_us_img', 'free_img']));

        if ($request->hasFile('cover_img')) {
            Storage::delete($aboutUsPageContent->cover_img);
            $aboutUsPageContent->update(['cover_img' => $request->file('cover_img')->store('web_pages_images/about_us_page')]);
        }

        if ($request->hasFile('about_us_img')) {
            Storage::delete($aboutUsPageContent->about_us_img);
            $aboutUsPageContent->update(['about_us_img' => $request->file('about_us_img')->store('web_pages_images/about_us_page')]);
        }

        if ($request->hasFile('free_img')) {
            Storage::delete($aboutUsPageContent->free_img);
            $aboutUsPageContent->update(['free_img' => $request->file('free_img')->store('web_pages_images/about_us_page')]);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.about_us_page_content.index');
    }
}
