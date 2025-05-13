@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Editar Dados Pessoais</h1>

    {{-- Perfil --}}
    <div class="card mb-4">
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- Password --}}
    <div class="card mb-4">
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- Apagar conta --}}
    <div class="card">
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
