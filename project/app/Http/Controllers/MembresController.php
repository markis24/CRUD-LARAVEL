<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membres;

class MembresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membres = Membres::paginate(4);
        return view('membres.index', compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('membres.crear');

    }

    /**
     * Store a newly created resource in storage.
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

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenMembres = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenMembres);
            $membre['imagen'] = "$imagenMembres";
        }
        Membres::create($membre);
        return redirect()->route('membres.index')->with('success', 'Membre creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membres $membres)
    {
        return view('membres.editar', compact('membres'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:400',
            'cv_path' => 'required|file|mimes:pdf|max:400',
            'links' => 'required',
            'description' => 'required',
        ]);
        $membre = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenMembres = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenMembres);
            $membre['imagen'] = "$imagenMembres";
        } else {
            unset($membre['imagen']);

        }
        $membre->update($membre);
        return redirect()->route('membres.index')->with('success', 'Membre actualizat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membres = Membres::find($id);
        return redirect()->route('membres.index')->with('success', 'Membre eliminat correctament.');
    }
}
