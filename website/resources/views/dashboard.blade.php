<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Pessoal - Adoptable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .dashboard-card {
            transition: transform 0.3s ease-in-out;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/LOGO1.png') }}" alt="Logo" width="124" height="36">
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Terminar Sessão</button>
            </form>
        </div>
    </nav>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="text-primary">Olá, {{ Auth::user()->name }} 👋</h2>
            <p class="text-muted">Bem-vindo à sua área pessoal</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <a href="{{ route('animais.index') }}" class="text-decoration-none">
                    <div class="card h-100 text-center bg-warning text-white p-4 dashboard-card">
                        <h5 class="card-title">🐾 Ver Animais</h5>
                        <p class="card-text small">Veja todos os animais disponíveis para adoção</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('profile.edit') }}" class="text-decoration-none">
                    <div class="card h-100 text-center bg-primary text-white p-4 dashboard-card">
                        <h5 class="card-title">⚙️ Editar Perfil</h5>
                        <p class="card-text small">Atualize as suas informações pessoais</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="card h-100 text-center bg-dark text-white p-4 dashboard-card">
                        <h5 class="card-title">🏠 Página Inicial</h5>
                        <p class="card-text small">Voltar à página principal do site</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
