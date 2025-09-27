<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('roles.view');

        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('roles.create');

        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('roles.create');

        $request->merge([
            'name' => Str::slug($request->input('display_name')),
        ]);

        $data = $request->validate([
            'display_name' => 'required|string|max:255',
            'name' => 'unique:roles,name',
            'permissions' => 'nullable|array',
        ], [
            'name.unique' => 'Ya existe un rol con ese nombre'
        ], [
            'display_name' => 'nombre del rol',
        ]);

        $role = Role::create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
        ]);

        //Verificar si se está recibiendo permisos, y asignarlos al rol si es el caso.
        if (isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Rol creado correctamente'
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('roles.update');

        $role->load('permissions');
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('roles.update');

        $request->merge([
            'name' => Str::slug($request->input('display_name')),
        ]);

        $data = $request->validate([
            'display_name' => 'required|string|max:255',
            'name' => 'unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
        ], [
            'name.unique' => 'Ya existe un rol con ese nombre'
        ], [
            'display_name' => 'nombre del rol',
        ]);

        $role->update([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
        ]);

        //Al recibir datos en el array, sincroniza las relaciones nuevas, mantiene las que ya estaban, elimina las que ya no están en el array
        if (isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        } else {
            //Si no se recibió nada en el array, quiere decir que se desmarcaron todos los permisos y se van a eliminar de la relacion
            $role->permissions()->detach();
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Rol actualizado correctamente'
        ]);

        return redirect()->route('admin.roles.edit', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('roles.delete');

        $role->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Rol eliminado correctamente'
        ]);

        return redirect()->route('admin.roles.index');
    }
}
