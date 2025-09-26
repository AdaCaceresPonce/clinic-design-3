<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use App\Models\Specialty;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $professionals = Professional::orderBy('id', 'desc')->with('specialties')->paginate(8);
        Gate::authorize('professionals.view');
        
        return view('admin.professionals.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('professionals.create');

        $specialties = Specialty::all();
        return view('admin.professionals.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('professionals.create');

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
        ],[], [
            'name' => 'nombres',
            'lastname' => 'apellidos',
            'description' => 'descripción',
            'photo_path' => 'foto del profesional',
            'specialties' => 'especialidades',
            'facebook_link' => 'enlace de facebook',
            'linkedin_link' => 'enlace de linkedin',
            'twitter_link' => 'enlace de twitter',
            'instagram_link' => 'enlace de instagram',
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
        Gate::authorize('professionals.update');

        $specialties = Specialty::all();
        return view('admin.professionals.edit', compact('professional', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professional $professional)
    {
        Gate::authorize('professionals.update');

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'description' => 'required',
            'photo_path' => 'image|max:1024',
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
            'photo_path.image' => 'El archivo cargado debe ser una imagen.',
        ]);

        $specialties = $request->input('specialties', []);
        $currentSpecialties = $professional->specialties->pluck('id')->toArray();

        // Identifica las especialidades a adjuntar (nuevas)
        $newSpecialties = array_diff($specialties, $currentSpecialties);
        foreach ($newSpecialties as $specialtyId) {
            $professional->specialties()->attach($specialtyId);
        }
        // Identifica las especialidades a desvincular (eliminadas)
        $removedSpecialties = array_diff($currentSpecialties, $specialties);
        foreach ($removedSpecialties as $specialtyId) {
            $professional->specialties()->detach($specialtyId);
        }

        $professional->update($request->except(['photo_path']));

        if ($request->hasFile('photo_path')) {
            Storage::delete($professional->photo_path);
            $professional->update(['photo_path' => $request->file('photo_path')->store('professionals')]);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Datos del profesional actualizados correctamente'
        ]);

        return redirect()->route('admin.professionals.edit', compact('professional'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professional $professional)
    {
        Gate::authorize('professionals.delete');

        Storage::delete($professional->photo_path);

        $professional->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Realizado!',
            'text' => 'Profesional eliminado correctamente.'
        ]);

        return redirect()->route('admin.professionals.index');
    }
}
