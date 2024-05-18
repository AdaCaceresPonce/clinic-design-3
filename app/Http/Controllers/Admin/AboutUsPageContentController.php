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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUsPageContent $aboutUsPageContent)
    {
        //
    }
}
