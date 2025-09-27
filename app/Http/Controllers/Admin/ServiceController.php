<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Gate::authorize('services.view');
        $services = Service::orderBy('id', 'desc')->paginate(6);
        
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('services.create');
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Gate::authorize('services.create');

        $request['slug'] = Str::slug($request->input('name'));

        $request->validate([
            'name' => 'required',
            'slug' => 'unique:services',
            'small_description' => 'required',
            'long_description' => 'required',
            'card_img_path' => 'required|image|max:1024',
            'cover_img_path' => 'required|image|max:1024',
        ],[
            'name.required' => 'El nombre del servicio es obligatorio.',
            'small_description.required' => 'La descripcion para la tarjeta es necesaria.',
            'long_description.required' => 'La descripcion del servicio es necesaria.',
            'slug.unique' => 'Ya hay un servicio registrado con ese nombre.',
            'card_img_path.required' => 'La imagen para la tarjeta es obligatoria.',
            'card_img_path.image' => 'El archivo para la tarjeta debe ser una imagen.',
            'cover_img_path.required' => 'La imagen de portada es obligatoria.',
            'cover_img_path.image' => 'El archivo para la portada debe ser una imagen.',
        ],[
            'name' => 'nombre',
            'slug' => 'slug',
            'small_description' => 'descripción para la carta',
            'long_description' => 'descripción general del servicio',
            'card_img_path' => 'imagen para la tarjeta',
            'cover_img_path' => 'imagen de portada',
        ]);

        $service = [];
        $service = $request->all();
        // $service['slug'] = Str::slug($request->input('name'));
        $service['card_img_path'] = $request->file('card_img_path')->store('services/card_images');
        $service['cover_img_path'] = $request->file('cover_img_path')->store('services/cover_images');

        Service::create($service);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Servicio creado correctamente'
        ]);

        return redirect()->route('admin.services.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        Gate::authorize('services.update');

        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        Gate::authorize('services.update');

        $request['slug'] = Str::slug($request->input('name'));

        $request->validate([
            'name' => 'required',
            'slug' => 'unique:services,slug,'. $service->id,
            'small_description' => 'required',
            'long_description' => 'required',
            'card_img_path' => 'image|max:2048',
            'cover_img_path' => 'image|max:1024',
        ],[],[
            'name' => 'nombre',
            'slug' => 'slug',
            'small_description' => 'descripción para la carta',
            'long_description' => 'descripción general del servicio',
            'card_img_path' => 'imagen para la carta',
            'cover_img_path' => 'imagen de portada',
        ]);

        $service->update($request->except(['cover_img_path', 'card_img_path']));

        if ($request->hasFile('card_img_path')) {
            Storage::delete($service->card_img_path);
            $service->update(['card_img_path' => $request->file('card_img_path')->store('services/card_images')]);
        }

        if ($request->hasFile('cover_img_path')) {
            Storage::delete($service->cover_img_path);
            $service->update(['cover_img_path' => $request->file('cover_img_path')->store('services/cover_images')]);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Servicio actualizado correctamente'
        ]);

        return redirect()->route('admin.services.edit', compact('service'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Gate::authorize('services.delete');

        Storage::delete($service->card_img_path);
        Storage::delete($service->cover_img_path);

        $service->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Realizado!',
            'text' => 'Servicio eliminado correctamente.'
        ]);

        return redirect()->route('admin.services.index');
    }
}
