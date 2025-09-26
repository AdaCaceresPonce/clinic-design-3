<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('specialties.view');

        $specialties = Specialty::orderBy('id', 'desc')->paginate(6);
        
        return view('admin.specialties.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('specialties.create');

        return view('admin.specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('specialties.create');

        $request->validate([
            'name' => 'required'
        ]);

        Specialty::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Especialidad creada correctamente'
        ]);

        return redirect()->route('admin.specialties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialty $specialty)
    {
        Gate::authorize('specialties.update');

        return view('admin.specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialty $specialty)
    {
        Gate::authorize('specialties.update');

        $request->validate([
            'name' => 'required'
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Especialidad actualizada correctamente'
        ]);

        $specialty->update($request->all());
        return redirect()->route('admin.specialties.edit', compact('specialty'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        Gate::authorize('specialties.delete');

        if ($specialty->professionals()->count() > 0){
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'No se puede eliminar la especialidad porque tiene profesionales asociados.'
            ]);

            return redirect()->route('admin.specialties.edit', compact('specialty'));
        }

        $specialty->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Realizado!',
            'text' => 'Especialidad eliminada correctamente.'
        ]);

        return redirect()->route('admin.specialties.index');
    }
}
