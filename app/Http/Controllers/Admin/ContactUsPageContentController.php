<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsPageContent;
use Illuminate\Http\Request;

class ContactUsPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = ContactUsPageContent::first();

        return view('admin.web_page_contents.contact_us_page.index', compact('contents'));
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
    public function show(ContactUsPageContent $contactUsPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUsPageContent $contactUsPageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUsPageContent $contactUsPageContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUsPageContent $contactUsPageContent)
    {
        //
    }
}
