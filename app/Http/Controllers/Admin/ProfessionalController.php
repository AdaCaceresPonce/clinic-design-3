<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use App\Models\Specialty;

use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professionals = Professional::orderBy('id', 'desc')->with('specialties')->paginate(8);
        
        return view('admin.professionals.index', compact('professionals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties = Specialty::all();
        return view('admin.professionals.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'description' => 'required',
            'photo_path' => 'required|image|max:1024',
            'specialties' => 'required',
            'facebook_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
        ],[
            'name.required' => 'El nombre del profesional es obligatorio.',
            'lastname.required' => 'El apellido del profesional es obligatorio.',
            'description.required' => 'La descripcion del profesional es requerido.',
            'specialties.required' => 'Selecciona al menos una especialidad.',
            'slug.unique' => 'Ya hay un servicio registrado con ese nombre.',
            'photo_path.required' => 'La foto del profesional es necesaria.',
            'photo_path.image' => 'El archivo cargado debe ser una imagen.',
        ]);

        $professional = [];
        $professional = $request->all();
        $professional['photo_path'] = $request->file('photo_path')->store('professionals');


        $new_professional = Professional::create($professional);

        //Asignar las especialidades
        $specialties = $request->input('specialties', []);
        foreach ($specialties as $specialtyId) {
            $new_professional->specialties()->attach($specialtyId);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Profesional registrado correctamente'
        ]);

        return redirect()->route('admin.professionals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professional $professional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professional $professional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professional $professional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professional $professional)
    {
        //
    }
}