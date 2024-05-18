<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurServicesPageContent;
use Illuminate\Http\Request;

class OurServicesPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = OurServicesPageContent::first();

        return view('admin.web_page_contents.our_services_page.index', compact('contents'));
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
    public function show(OurServicesPageContent $ourServicesPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurServicesPageContent $ourServicesPageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurServicesPageContent $ourServicesPageContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurServicesPageContent $ourServicesPageContent)
    {
        //
    }
}
