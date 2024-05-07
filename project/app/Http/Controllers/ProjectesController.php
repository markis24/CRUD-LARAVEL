<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class articlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectes = Articles::paginate(4);
        return view('projectes.index', compact('projectes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projectes.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text_projecte' => 'required',
            'text_resultat' => 'required',
        ]);

        $projecte = $request->all();

        Articles::create($projecte);
        return redirect()->route('projectes.index')->with('success', 'Proyecto creado correctamente.');
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
    public function edit(string $id)
    {
        return view('projectes.editar', compact('projecte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'text_projecte' => 'required',
            'text_resultat' => 'required',
        ]);

        $data = $request->all();

        $projecte->update($data);
        return redirect()->route('projectes.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projecte = Projectes::findOrFail($id);
        $projecte->delete();
        return redirect()->route('projectes.index')->with('success', 'Proyecto eliminado correctamente.');
    }
}
