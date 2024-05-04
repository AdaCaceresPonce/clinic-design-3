<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicInformation;
use Illuminate\Http\Request;

class ClinicInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinic_information = ClinicInformation::first();
        return view('admin.clinic_information.index', compact('clinic_information'));
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
    public function show(ClinicInformation $clinicInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClinicInformation $clinicInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClinicInformation $clinicInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClinicInformation $clinicInformation)
    {
        //
    }
}
