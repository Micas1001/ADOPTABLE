@extends('layouts.app')

@section('title', 'Contacto - Adoptable')

@section('content')
    <!-- Hero de Contacto -->
    <section class="py-5 text-white" style="background-color: #FE5101;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Fale connosco</h1>
            <p class="lead">Tem dúvidas, sugestões ou quer colaborar? Estamos aqui para o ouvir!</p>
        </div>
    </section>

    <!-- Secção de Contacto -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5">
                <!-- Formulário -->
                <div class="col-lg-7">
                    <div class="bg-white shadow rounded p-4">
                        <h2 class="fw-bold mb-4">Envie-nos uma mensagem</h2>
                        <form action="{{ route('contacto.enviar') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="mensagem" class="form-label">Mensagem</label>
                                <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                        </form>
                    </div>
                </div>

                <!-- Informações de contacto -->
                <div class="col-lg-5">
                    <div class="bg-white shadow rounded p-4 h-100">
                        <h2 class="fw-bold mb-4">Informações de Contacto</h2>
                        <p class="mb-3"><i class="bi bi-geo-alt-fill me-2 text-danger"></i> São Martinho do Bispo, Coimbra</p>
                        <p class="mb-3"><i class="bi bi-envelope-fill me-2 text-primary"></i> contactoadoptable@gmail.com</p>
                        <p class="mb-3"><i class="bi bi-telephone-fill me-2 text-success"></i> +351 912 345 678</p>

                        <h5 class="mt-4">Redes Sociais</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-decoration-none text-dark"><i class="bi bi-facebook fs-4"></i></a>
                            <a href="#" class="text-decoration-none text-dark"><i class="bi bi-instagram fs-4"></i></a>
                            <a href="#" class="text-decoration-none text-dark"><i class="bi bi-twitter fs-4"></i></a>
                        </div>

                        <div class="mt-5">
                            <iframe class="w-100 rounded" height="200" frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3121.7251419579374!2d-8.42984728463121!3d40.205707079393336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd22f90ac90e3f07%3A0xc20e760c8ccf47ea!2sCoimbra!5e0!3m2!1spt-PT!2spt!4v1617296089699!5m2!1spt-PT!2spt"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
