<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $query = Animal::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('raca')) {
            $query->where('raca', 'like', '%' . $request->raca . '%');
        }

        if ($request->filled('sexo')) {
            $query->where('sexo', $request->sexo);
        }

        if ($request->filled('idade')) {
            $query->where('idade', $request->idade);
        }

        if ($request->filled('localizacao')) {
            $query->where('localizacao', $request->localizacao);
        }

        $animais = $query->paginate(9);

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
            'imagem' => $imagemPath,
            'user_id' => auth()->id(), // opcional: associar o animal ao utilizador
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required',
            'raca' => 'required|string|max:255',
            'sexo' => 'required',
            'idade' => 'required',
            'localizacao' => 'required',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $animal = Animal::findOrFail($id);

        $animal->nome = $request->nome;
        $animal->tipo = $request->tipo;
        $animal->raca = $request->raca;
        $animal->sexo = $request->sexo;
        $animal->idade = $request->idade;
        $animal->localizacao = $request->localizacao;

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('animais', 'public');
            $animal->imagem = $path;
        }

        $animal->save();

        return redirect()->route('admin.animais.index')->with('success', 'Animal atualizado com sucesso.');
    }


    /**
     * Remove um animal da base de dados.
     */
    public function destroy(Animal $animal)
    {
        // Verificar se está autenticado
        if (!auth()->check()) {
            abort(403, 'Precisa de estar autenticado.');
        }

        // Verificar se o animal pertence ao utilizador
        if ((int) $animal->user_id !== (int) auth()->id()) {
            abort(403, 'Não tem autorização para apagar este animal.');
        }

        // Apagar imagem, se existir
        if ($animal->imagem) {
            Storage::delete($animal->imagem);
        }

        $animal->delete();

        return redirect()->back()->with('success', 'Animal eliminado com sucesso!');
    }

    public function show($id)
    {
        $animal = Animal::with('user')->findOrFail($id);
        return view('animais.show', compact('animal'));
    }


    public function createUser()
    {
        return view('animais.criar-animal');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'raca' => 'required',
            'sexo' => 'required',
            'idade' => 'required',
            'localizacao' => 'required',
            'imagem' => 'nullable|image|max:2048'
        ]);

        $animal = new Animal();
        $animal->user_id = auth()->id(); // opcional: associar o animal ao utilizador
        $animal->nome = $request->nome;
        $animal->tipo = $request->tipo;
        $animal->raca = $request->raca;
        $animal->sexo = $request->sexo;
        $animal->idade = $request->idade;
        $animal->localizacao = $request->localizacao;

        if ($request->hasFile('imagem')) {
            $animal->imagem = $request->file('imagem')->store('animais', 'public');
        }

        $animal->save();

        return redirect()->route('animais.index')->with('success', 'Animal registado com sucesso!');
    }

}

