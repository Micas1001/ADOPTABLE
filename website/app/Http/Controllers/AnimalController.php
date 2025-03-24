<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        // Busca apenas os gatos na base de dados
        $gatos = Animal::where('especie', 'Gato')->get();
        return view('gatos', compact('gatos'));
    }

    public function criarGato()
    {
        return view('admin.adicionar'); // Vamos criar essa view para o formulário
    }

    public function salvarGato(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sexo' => 'required|in:Macho,Fêmea',
            'idade' => 'required|integer',
            'localizacao' => 'required|string|max:255',
            'raca' => 'nullable|string|max:255',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lidar com o upload da imagem
        $imagem = $request->file('imagem');
        $imagemPath = $imagem->store('images/gatos', 'public');

        // Criar o gato
        Animal::create([
            'nome' => $validated['nome'],
            'sexo' => $validated['sexo'],
            'idade' => $validated['idade'],
            'localizacao' => $validated['localizacao'],
            'raca' => $validated['raca'],
            'imagem' => $imagemPath,
            'especie' => 'Gato', // Definir a espécie como 'Gato'
        ]);

        return redirect()->route('admin.gatos.adicionar')->with('success', 'Gato adicionado com sucesso!');
    }

}



