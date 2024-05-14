<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomePageContent;
use Illuminate\Http\Request;

class WelcomePageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WelcomePageContent $welcomePageContent)
    {
        $request->validate([
            'cover_title' => 'required',
            'cover_description' => 'required',
            // 'cover_img',
            // 'about_title' => 'required',
            // 'about_description' => 'required',
            // 'about_we_offer_you' => 'required',
            // 'about_image',
            // 'our_services_title' => 'required',
            // 'our_services_description' => 'required',
            // 'our_professionals_title' => 'required',
            // 'our_professionals_description' => 'required',
            // 'testimonials_title' => 'required',
            // 'testimonials_description' => 'required',
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        $welcomePageContent->update($request->all());
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
