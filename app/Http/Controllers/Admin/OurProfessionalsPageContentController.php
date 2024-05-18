<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurProfessionalsPageContent;
use Illuminate\Http\Request;

class OurProfessionalsPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurProfessionalsPageContent $ourProfessionalsPageContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurProfessionalsPageContent $ourProfessionalsPageContent)
    {
        //
    }
}
