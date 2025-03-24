<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Gato</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Adoptable</a>
            <div class="d-flex">
                <a href="/admin/gatos/adicionar" class="btn btn-primary">Adicionar Gato</a>
            </div>
        </div>
    </nav>

    <!-- FORMULÁRIO -->
    <div class="container mt-5">
        <h2 class="text-center">Adicionar um Novo Gato</h2>

        <!-- Mensagem de Sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulário de Adição -->
        <form method="POST" action="{{ route('admin.adicionar') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo" required>
                    <option value="Macho">Macho</option>
                    <option value="Fêmea">Fêmea</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="idade" class="form-label">Idade (anos)</label>
                <input type="number" class="form-control" id="idade" name="idade" required>
            </div>

            <div class="mb-3">
                <label for="localizacao" class="form-label">Localização</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao" required>
            </div>

            <div class="mb-3">
                <label for="raca" class="form-label">Raça (opcional)</label>
                <input type="text" class="form-control" id="raca" name="raca">
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem" required>
            </div>

            <button type="submit" class="btn btn-primary">Adicionar Gato</button>
        </form>
    </div>

    <!-- FOOTER -->
    <footer class="bg-light py-3 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 Adoptable. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
