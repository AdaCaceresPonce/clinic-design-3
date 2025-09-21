<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Usuario creado correctamente'
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        //Si la contraseña no se recibe vacia, se hace el encriptado, ya que se va a actualizar
        if (!empty($data['password'])) {

            $data['password'] = bcrypt($data['password']);
        } else {

            //En cambio si se recibe vacia, se quita del array
            unset($data['password']);
        }

        $user->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Usuario actualizado correctamente'
        ]);

        return redirect()->route('admin.users.edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if (auth()->id() === $user->id) {

            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'Lo sentimos. No puedes eliminar tu propio usuario.'
            ]);

            return redirect()->route('admin.users.index');
        }

        $user->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Usuario eliminado correctamente'
        ]);

        return redirect()->route('admin.users.index');
    }
}
