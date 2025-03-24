<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gatos para Adoção</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/LOGO1.png') }}" alt="Adoptable" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-orange" href="#">Gatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cães</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Doe</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="/login" class="btn btn-outline-secondary me-2">Login</a>
                    <a href="/register" class="btn btn-orange text-white">Criar Conta</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO DA PÁGINA -->
    <div class="container mt-5">
        <h2 class="text-center">Encontre o seu novo amigo</h2>

        <!-- Filtros -->
        <div class="card p-3 mb-4">
            <form method="GET" action="{{ route('gatos') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label>Localização</label>
                        <select class="form-select" name="localizacao">
                            <option value="">Todas</option>
                            <option value="Lisboa">Lisboa</option>
                            <option value="Porto">Porto</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Raça</label>
                        <select class="form-select" name="raca">
                            <option value="">Todas</option>
                            <option value="Siamês">Siamês</option>
                            <option value="Persa">Persa</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Sexo</label>
                        <select class="form-select" name="sexo">
                            <option value="">Todos</option>
                            <option value="Macho">Macho</option>
                            <option value="Fêmea">Fêmea</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Procurar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Apresentação dos Gatos -->
        <div class="row">
            @foreach($gatos as $gato)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/gatos/' . $gato->imagem) }}" class="card-img-top" alt="{{ $gato->nome }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $gato->nome }}</h5>
                            <p class="card-text">{{ $gato->sexo }} • {{ $gato->idade }}</p>
                            <p class="text-muted"><i class="bi bi-geo-alt"></i> {{ $gato->localizacao }}</p>
                            <a href="#" class="btn btn-outline-primary w-100">Ver mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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

