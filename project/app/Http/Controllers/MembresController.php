<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membres;

class MembresController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $membres = Membres::paginate(4);
        return view('membres.index', compact('membres'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('membres.crear');
    }

    /**
     * Almacena un nuevo recurso en el almacenamiento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:400',
            'cv_path' => 'required|file|mimes:pdf|max:400',
            'links' => 'required',
            'description' => 'required',
        ]);

        $membre = $request->all();

        if ($request->hasFile('image_path')) {
            $rutaGuardarImg = 'imagen/';
            $imagenMembres = date('YmdHis') . "." . $request->file('image_path')->getClientOriginalExtension();
            $request->file('image_path')->move($rutaGuardarImg, $imagenMembres);
            $membre['image_path'] = $imagenMembres;
        }

        Membres::create($membre);
        return redirect()->route('membres.index')->with('success', 'Miembro creado correctamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit(Membres $membre)
    {
        return view('membres.editar', compact('membre'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, Membres $membre)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:400',
            'cv_path' => 'nullable|file|mimes:pdf|max:400',
            'links' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_path')) {
            $rutaGuardarImg = 'imagen/';
            $imagenMembres = date('YmdHis') . "." . $request->file('image_path')->getClientOriginalExtension();
            $request->file('image_path')->move($rutaGuardarImg, $imagenMembres);
            $data['image_path'] = $imagenMembres;
        } else {
            unset($data['image_path']);
        }

        $membre->update($data);
        return redirect()->route('membres.index')->with('success', 'Miembro actualizado correctamente.');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(string $id)
    {
        $membre = Membres::findOrFail($id);
        $membre->delete();
        return redirect()->route('membres.index')->with('success', 'Miembro eliminado correctamente.');
    }
}
