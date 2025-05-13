<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required',
        ]);

        $dados = $request->only(['nome', 'email', 'mensagem']);

        Mail::to('contactoadoptable@gmail.com')->send(new ContactMessageMail($dados));

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
