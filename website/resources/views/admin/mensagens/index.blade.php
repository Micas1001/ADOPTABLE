@extends('layouts.app')

@section('title', 'Mensagens de Adoção')

@section('content')
    <section class="py-5 text-center" style="background-color: #FE5101; color: white;">
        <div class="container">
            <h1 class="display-5 fw-bold">Mensagens Recebidas</h1>
            <p class="lead">Mensagens submetidas através do formulário de adoção.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($mensagens->isEmpty())
                <div class="alert alert-info">Nenhuma mensagem recebida ainda.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Mensagem</th>
                                <th>Recebida em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mensagens as $msg)
                                <tr>
                                    <td>{{ $msg->nome }}</td>
                                    <td>{{ $msg->email }}</td>
                                    <td>{{ $msg->mensagem }}</td>
                                    <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.mensagens.destroy', $msg->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem a certeza que deseja eliminar esta mensagem?')">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $mensagens->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
