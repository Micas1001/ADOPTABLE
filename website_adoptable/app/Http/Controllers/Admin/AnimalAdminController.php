<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalAdminController extends Controller
{
    public function index()
    {
        $animais = Animal::all();
        return view('admin.animais.index', compact('animais'));
    }

    public function create()
    {
        return view('admin.animais.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
            'sexo' => 'required|string|max:10',
            'idade' => 'required|string|max:50',
            'localizacao' => 'required|string|max:255',
            'imagem' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('animais', 'public');
        }

        Animal::create($validated);

        return redirect()->route('admin.animais.index')->with('success', 'Animal adicionado com sucesso!');

    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('admin.animais.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'raca' => 'required',
            'sexo' => 'required',
            'descricao' => 'nullable',
            'imagem' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('animais', 'public');
            $animal->imagem = $imagemPath;
        }

        $animal->update($request->only(['nome', 'tipo', 'raca', 'descricao']));

        return redirect()->route('admin.animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('admin.animais.index')->with('success', 'Animal removido com sucesso!');
    }
}
