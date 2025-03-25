<!-- resources/views/admin/animais/index.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Animais - Admin</title>
    <link href="https://https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Animais para Adoção</h2>
            <a href="{{ route('admin.animais.create') }}" class="btn btn-success">+ Adicionar Animal</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($animais->count())
            <div class="row">
                @foreach($animais as $animal)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($animal->imagem)
                                <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="Imagem de {{ $animal->nome }}" style="object-fit: cover; height: 250px;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $animal->nome }}</h5>
                                <p class="card-text"><strong>Tipo:</strong> {{ ucfirst($animal->tipo) }}</p>
                                <p class="card-text">{{ Str::limit($animal->descricao, 100) }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('admin.animais.edit', $animal->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('admin.animais.destroy', $animal->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem a certeza que deseja apagar este animal?')">Apagar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Nenhum animal encontrado.</div>
        @endif
    </div>
</body>
</html>
