<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'comentario' => 'required|string|max:1000',
            'avaliacao' => 'nullable|integer|min:1|max:5',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'animal_id' => $request->animal_id,
            'comentario' => $request->comentario,
            'avaliacao' => $request->avaliacao,
        ]);

        return back()->with('success', 'Comentário adicionado com sucesso!');
    }
}

