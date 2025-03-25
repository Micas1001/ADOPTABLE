<!-- resources/views/admin/animais/create.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Animal - Administração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4">Adicionar Novo Animal</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.animais.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo (Cão, Gato...)</label>
                <input type="text" name="tipo" id="tipo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" name="raca" id="raca" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="">Selecione</option>
                    <option value="Macho">Macho</option>
                    <option value="Fêmea">Fêmea</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="idade" class="form-label">Idade</label>
                <input type="text" name="idade" id="idade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="localizacao" class="form-label">Localização</label>
                <input type="text" name="localizacao" id="localizacao" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" name="imagem" id="imagem" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Adicionar Animal</button>
        </form>
    </div>
</body>
</html>
