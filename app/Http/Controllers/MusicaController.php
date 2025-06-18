<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importar a classe Storage

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca todas as músicas do banco de dados
        $musicas = Musica::all();
        // Retorna a view 'index' dentro da pasta 'musicas' e passa a variável $musicas
        return view('musicas.index', compact('musicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('musicas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'album' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('public/capas');
            $validatedData['imagem'] = str_replace('public/', '', $path);
        }

        Musica::create($validatedData);

        return redirect()->route('musicas.index')->with('success', 'Música adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Musica $musica)
    {
        return view('musicas.show', compact('musica'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Musica $musica)
    {
        return view('musicas.edit', compact('musica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musica $musica)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'album' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            // Apaga a imagem antiga se existir
            if ($musica->imagem) {
                Storage::delete('public/' . $musica->imagem);
            }
            $path = $request->file('imagem')->store('public/capas');
            $validatedData['imagem'] = str_replace('public/', '', $path);
        }

        $musica->update($validatedData);

        return redirect()->route('musicas.index')->with('success', 'Música atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musica $musica)
    {
        // Apaga a imagem associada
        if ($musica->imagem) {
            Storage::delete('public/' . $musica->imagem);
        }
        
        $musica->delete();

        return redirect()->route('musicas.index')->with('success', 'Música excluída com sucesso!');
    }
}
