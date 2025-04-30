<section class="mb-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 mb-3 text-primary">
                {{ __('Informação de Perfil') }}
            </h2>

            <p class="text-muted mb-4">
                {{ __('Atualize o nome e o email associados à sua conta.') }}
            </p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Nome') }}</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-muted small">
                                {{ __('O seu email ainda não está verificado.') }}
                                <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                                    {{ __('Clique aqui para reenviar o email de verificação.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <div class="text-success small">
                                    {{ __('Um novo link de verificação foi enviado para o seu email.') }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>

                    @if (session('status') === 'profile-updated')
                        <p class="text-success ms-3 mb-0">{{ __('Guardado.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
