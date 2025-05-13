<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\AnimalAdminController;
use App\Models\Animal;
use App\Http\Controllers\Admin\MessageAdminController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AdocaoController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    $animais = Animal::latest()->take(6)->get(); // ou mais, como quiseres
    return view('home', compact('animais'));
})->name('home');

Route::get('/animais', [AnimalController::class, 'index'])->name('animais.index');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

Route::get('/doar', function () {
    return view('doacao');
})->name('doacao');

Route::get('/dashboard', function () {
    $animais = Animal::where('user_id', auth()->id())->get();
    return view('dashboard', compact('animais'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        abort_unless(auth()->user()->is_admin, 403);
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::get('/animais', [AnimalAdminController::class, 'index'])->name('animais.index');
    Route::get('/animais/create', [AnimalAdminController::class, 'create'])->name('animais.create');
    Route::post('/animais', [AnimalAdminController::class, 'store'])->name('animais.store');
    Route::get('/animais/{id}/edit', [AnimalAdminController::class, 'edit'])->name('animais.edit');
    Route::put('/animais/{id}', [AnimalAdminController::class, 'update'])->name('animais.update');
    Route::delete('/animais/{id}', [AnimalAdminController::class, 'destroy'])->name('animais.destroy');
});

Route::get('/animais/{id}', [AnimalController::class, 'show'])->name('animais.show');

Route::get('/sobrenos', function () {
    return view('sobrenos');
})->name('sobrenos');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');

Route::post('/adocao/enviar', [AdocaoController::class, 'enviar'])->name('adocao.enviar');


Route::delete('/animais/{animal}', [AnimalController::class, 'destroy'])->name('animais.destroy');



Route::middleware(['auth'])->group(function () {
    Route::get('/criar-animal', [AnimalController::class, 'createUser'])->name('animais.user.create');
    Route::post('/criar-animal', [AnimalController::class, 'storeUser'])->name('animais.user.store');
});

Route::post('/comentarios', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comentarios.store');





require __DIR__ . '/auth.php';
