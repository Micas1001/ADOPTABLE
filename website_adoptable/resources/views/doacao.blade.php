@extends('layouts.app')

@section('title', 'Como Ajudar – Doações')

@section('content')
<section class="text-white py-5" style="background-color: #FE5101;">
    <div class="container text-center">
        <h1 class="display-5 fw-bold">Ajude-nos a Salvar Vidas</h1>
        <p class="lead">A sua doação faz a diferença no futuro de muitos animais.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
             <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/doacao.jpg') }}" alt="Ajudar animais" class="img-fluid rounded shadow w-100" style="max-height: 500px; object-fit: cover;">
            </div>
            <div class="col-lg-6">
                <h3 class="mb-3 text-highlight">Como Pode Ajudar?</h3>
                <p class="mb-4">Ao contribuir com uma doação, está a garantir alimentação, cuidados médicos, abrigo e oportunidades de adoção para centenas de animais que precisam.</p>

                <div class="bg-light p-4 rounded shadow-sm">
                    <h5 class="mb-3">Transferência Bancária</h5>
                    <p class="mb-1"><strong>IBAN:</strong> PT50 0002 0123 1234 5678 9101 2</p>
                    <p class="mb-1"><strong>Titular:</strong> Associação Adoptable</p>
                    <p><strong>Banco:</strong> CGD – Caixa Geral de Depósitos</p>
                </div>

                <div class="bg-light p-4 rounded shadow-sm mt-4">
                    <h5 class="mb-3">MB WAY</h5>
                    <p><strong>Número:</strong> 912 345 678</p>
                    <p>Envie a sua doação via MB Way com a descrição “Adoptable”.</p>
                </div>

                <p class="mt-4 text-muted fst-italic">Se pretender um comprovativo de donativo, entre em contacto connosco através da página <a href="{{ route('contacto') }}">Contacto</a>.</p>
            </div>
        </div>
    </div>
</section>
@endsection
