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
        return view('admin.web_page_contents.welcome_page.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WelcomePageContent $welcomePageContent)
    {
        //
    }
}
