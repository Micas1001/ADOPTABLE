<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Mostra a lista de animais, com opção de filtro por tipo (cão/gato).
     */
    public function index(Request $request)
    {
        $tipo = $request->query('tipo'); // Obtém o tipo do animal da pesquisa
        $animais = Animal::when($tipo, function ($query) use ($tipo) {
            return $query->where('tipo', $tipo);
        })->get();

        return view('animais.index', compact('animais'));
    }

    /**
     * Mostra o formulário para adicionar um novo animal.
     */
    public function create()
    {
        return view('animais.create');
    }

    /**
     * Guarda um novo animal na base de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo' => 'required|in:cão,gato',
            'imagem' => 'nullable|image|max:2048'
        ]);

        $imagemPath = null;
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('animals', 'public');
        }

        Animal::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'imagem' => $imagemPath
        ]);

        return redirect()->route('animais.index')->with('success', 'Animal adicionado com sucesso!');
    }

    /**
     * Mostra o formulário para editar um animal.
     */
    public function edit(Animal $animal)
    {
        return view('animais.edit', compact('animal'));
    }

    /**
     * Atualiza os dados do animal.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo' => 'required|in:cão,gato',
            'imagem' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            if ($animal->imagem) {
                Storage::disk('public')->delete($animal->imagem);
            }
            $imagemPath = $request->file('imagem')->store('animals', 'public');
            $animal->imagem = $imagemPath;
        }

        $animal->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    /**
     * Remove um animal da base de dados.
     */
    public function destroy(Animal $animal)
    {
        if ($animal->imagem) {
            Storage::disk('public')->delete($animal->imagem);
        }

        $animal->delete();

        return redirect()->route('animais.index')->with('success', 'Animal removido com sucesso!');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animais.show', compact('animal'));
    }

}




