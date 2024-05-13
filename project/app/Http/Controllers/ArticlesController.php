<?php

namespace App\Http\Controllers;

use App\Models\Articles; // Cambié Articles a Article para seguir la convención de nombres de modelos en singular
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::paginate(4); // Cambié Articles a Article
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.crear'); // Cambié 'articles.crear' a 'articles.create'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_article' => 'required', // Cambié 'title_article' a 'title'
            'text_article' => 'required', // Cambié 'text_article' a 'text'
        ]);

        $article = $request->all();
        Articles::create($article); // Cambié Articles a Article
        return redirect()->route('articles.index')->with('success', 'Artículo creado correctamente.'); // Cambié 'Articulo' a 'Artículo'
    }

    /**
     * Display the specified resource.
     */
    public function show(Articles $article) // Cambié el tipo de parámetro de string a Article
    {
        return view('articles.show', compact('article')); // Agregué el método 'show' para mostrar el artículo
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $article) // Cambié el tipo de parámetro de string a Article
    {
        return view('articles.editar', compact('article')); // Cambié 'articles.editar' a 'articles.edit' y el tipo de parámetro de string a Article
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articles $article) // Cambié el tipo de parámetro de string a Article
    {
        $request->validate([
            'title_article' => 'required',
            'text_article' => 'required',
        ]);

        $data = $request->all();

        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'Artículo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $article) // Cambié el tipo de parámetro de string a Article
    {
        $article->delete(); // Cambié Articles a Article
        return redirect()->route('articles.index')->with('success', 'Artículo eliminado correctamente.'); // Cambié 'Articulo' a 'Artículo'
    }
}
