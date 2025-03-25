<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function toggle(Request $request)
    {
        // Verifica se o usuário está autenticado
        if (auth()->check()) {
            // Supondo que o animal tenha um 'id' passado via formulário
            $animalId = $request->input('animal_id');

            // Aqui vamos adicionar ou remover o animal da wishlist do usuário
            $user = auth()->user();

            if ($user->wishlist->contains($animalId)) {
                // Remove da wishlist
                $user->wishlist()->detach($animalId);
            } else {
                // Adiciona à wishlist
                $user->wishlist()->attach($animalId);
            }

            // Retorna uma resposta para o front-end
            return response()->json([
                'success' => true,
                'message' => 'Wishlist atualizada com sucesso!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Você precisa estar logado para adicionar à wishlist.'
        ]);
    }
    public function index()
    {
        $user = auth()->user();

        // Certifica-te que a relação 'wishlist' está definida no modelo User
        $animais = $user->wishlist ?? collect();

        return view('wishlist', compact('animais'));
    }
}
