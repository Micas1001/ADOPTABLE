<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdocaoMessageMail;
use App\Models\Animal;

class AdocaoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required',
            'mensagem' => 'required',
            'animal_id' => 'required|exists:animals,id'
        ]);

        $animal = Animal::findOrFail($request->animal_id);

        $dados = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'mensagem' => $request->mensagem,
            'animal' => $animal->nome,
            'animal_id' => $animal->id,
        ];

        Mail::to('contactoadoptable@gmail.com')->send(new AdocaoMessageMail($dados));

        return redirect()->back()->with('success', 'Candidatura enviada com sucesso!');
    }
}
