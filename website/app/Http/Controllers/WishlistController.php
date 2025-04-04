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

            if ($user->wishlist()->where('animal_id', $animalId)->exists()) {
                $user->wishlist()->detach($animalId);
                return redirect()->back()->with('success', 'Animal removido da wishlist!');
            } else {
                $user->wishlist()->attach($animalId);
                return redirect()->back()->with('success', 'Animal adicionado à wishlist!');
            }
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
