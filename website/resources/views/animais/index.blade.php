<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais para Adoção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #FE5101;
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }
        .logo img {
            height: 50px;
        }
        .filter-bar {
            margin-top: 20px;
            text-align: center;
        }
        .btn-filter {
            background-color: #FE5101;
            color: white;
            margin: 0 5px;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
        }
        .btn-filter:hover {
            background-color: #d64500;
        }
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .card img {
            height: 250px;
            object-fit: cover;
        }
        .wishlist-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #ccc;
        }
        .wishlist-btn:hover {
            color: red;
        }
        footer {
            background-color: #FE5101;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <header class="d-flex align-items-center justify-content-between p-3" style="background-color: #FE5101;">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('images/LOGO1.png') }}" alt="Adoptable Logo" style="height: 35px;">
            </a>

            <!-- Título Centralizado -->
            <h1 class="text-white text-center flex-grow-1 m-0" style="font-size: 1.8rem;">
                Animais para Adoção
            </h1>

            <!-- Espaço à direita para equilibrar -->
            <div style="width: 100px;"></div>
        </div>
    </header>



    <main class="container mt-4">
        <!-- Filtros -->
        <div class="filter-bar mb-4">
            <a href="{{ route('animais.index') }}" class="btn btn-filter">Todos</a>
            <a href="{{ route('animais.index', ['tipo' => 'cão']) }}" class="btn btn-filter">Cães</a>
            <a href="{{ route('animais.index', ['tipo' => 'gato']) }}" class="btn btn-filter">Gatos</a>
        </div>

        <!-- Lista de Animais -->
        <div class="row">
            @foreach($animais as $animal)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Imagem -->
                    @if($animal->imagem)
                        <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top img-fluid" alt="{{ $animal->nome }}">
                    @else
                        <img src="https://via.placeholder.com/300x250" class="card-img-top img-fluid" alt="Sem imagem">
                    @endif

                    <!-- Corpo do cartão -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $animal->nome }}</h5>
                        <p class="mb-1"><strong>Tipo:</strong> {{ $animal->tipo }}</p>
                        <p class="mb-1"><strong>Raça:</strong> {{ $animal->raca }}</p>
                        <p class="mb-1"><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                        <p class="mb-1"><strong>Idade:</strong> {{ $animal->idade }}</p>
                        <p class="mb-2"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                        <p class="card-text text-muted">{{ Str::limit($animal->descricao, 100) }}</p>

                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <!-- Botão Wishlist -->
                            <button class="wishlist-btn btn btn-outline-danger btn-sm" data-id="{{ $animal->id }}" title="Adicionar aos favoritos">
                                ❤️
                            </button>

                            <!-- Botão Ver Mais -->
                            <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-primary btn-sm">Ver mais</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>

        @if($animais->isEmpty())
            <p class="text-center">Nenhum animal disponível para adoção no momento.</p>
        @endif
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Adoptable. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.querySelectorAll('.wishlist-btn').forEach(button => {
            button.addEventListener('click', function () {
                const animalId = this.getAttribute('data-id');

                axios.post('{{ route('wishlist.toggle') }}', {
                    animal_id: animalId
                }, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Animal adicionado à wishlist!',
                        showConfirmButton: true,
                        confirmButtonText: 'Ir para wishlist ❤️',
                        showCancelButton: true,
                        cancelButtonText: 'Continuar a navegar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('wishlist') }}";
                        }
                    });
                }).catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao adicionar à wishlist!',
                        text: 'Tenta novamente mais tarde.'
                    });
                });
            });
        });
        </script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
