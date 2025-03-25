<!-- resources/views/admin/animais/edit.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Animal - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h2 class="text-primary mb-4">Editar Animal</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.animais.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $animal->nome }}" required>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="cao" {{ $animal->tipo == 'cao' ? 'selected' : '' }}>Cão</option>
                    <option value="gato" {{ $animal->tipo == 'gato' ? 'selected' : '' }}>Gato</option>
                    <option value="outro" {{ $animal->tipo == 'outro' ? 'selected' : '' }}>Outro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4">{{ $animal->descricao }}</textarea>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem Atual</label><br>
                @if($animal->imagem)
                    <img src="{{ asset('storage/' . $animal->imagem) }}" alt="Imagem do animal" width="150" class="mb-2 rounded">
                @else
                    <p class="text-muted">Sem imagem</p>
                @endif
                <input type="file" name="imagem" id="imagem" class="form-control mt-2">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('admin.animais.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
