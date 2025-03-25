<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel de Admin - Adoptable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-hover:hover {
            background-color: #f1f1f1;
            transition: 0.3s;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4 text-center text-primary">Painel de Administração</h2>

        @if(session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="{{ route('admin.animais.index') }}" class="text-decoration-none">
                    <div class="card card-hover shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">🐾 Gerir Animais</h5>
                            <p class="card-text text-muted">Ver, editar ou remover animais disponíveis para adoção.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mt-4 mt-md-0">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="card card-hover shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">🏠 Voltar ao Site</h5>
                            <p class="card-text text-muted">Regressar à página inicial do website.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="text-center mt-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Terminar Sessão</button>
            </form>
        </div>
    </div>
</body>
</html>
