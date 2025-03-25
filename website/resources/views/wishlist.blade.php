<!-- resources/views/wishlist.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Wishlist - Adoptable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/LOGO1.png') }}" alt="Logo" width="124" height="36">
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Área Pessoal</a>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="text-center text-primary mb-4">🐾 Animais na sua Wishlist</h2>

        @if($animais->count())
            <div class="row">
                @foreach($animais as $animal)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($animal->imagem)
                                <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="{{ $animal->nome }}">
                            @else
                                <img src="https://via.placeholder.com/300x250" class="card-img-top" alt="Sem imagem">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $animal->nome }}</h5>
                                <p class="mb-1"><strong>Tipo:</strong> {{ $animal->tipo }}</p>
                                <p class="mb-1"><strong>Raça:</strong> {{ $animal->raca }}</p>
                                <p class="mb-1"><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                                <p class="mb-1"><strong>Idade:</strong> {{ $animal->idade }}</p>
                                <p class="mb-2"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                                <p class="text-muted">{{ Str::limit($animal->descricao, 100) }}</p>

                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-danger remover-wishlist" data-id="{{ $animal->id }}">
                                        ❌ Remover
                                    </button>
                                    <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-primary btn-sm">Ver mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">Ainda não adicionou nenhum animal à wishlist.</div>
        @endif
    </div>

    <script>
        document.querySelectorAll('.remover-wishlist').forEach(button => {
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
                        title: 'Removido da wishlist!',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => window.location.reload());
                }).catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao remover!',
                        text: 'Tenta novamente mais tarde.'
                    });
                });
            });
        });
    </script>
</body>
</html>
