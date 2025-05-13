<section class="mb-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 mb-3 text-primary">
                {{ __('Alterar Palavra-Passe') }}
            </h2>

            <p class="text-muted mb-4">
                {{ __('Garanta que a sua conta utiliza uma palavra-passe longa e segura.') }}
            </p>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label">{{ __('Palavra-Passe Atual') }}</label>
                    <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                    @error('current_password', 'updatePassword')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="update_password_password" class="form-label">{{ __('Nova Palavra-Passe') }}</label>
                    <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                    @error('password', 'updatePassword')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="update_password_password_confirmation" class="form-label">{{ __('Confirmar Palavra-Passe') }}</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                    @error('password_confirmation', 'updatePassword')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>

                    @if (session('status') === 'password-updated')
                        <p class="text-success ms-3 mb-0">{{ __('Guardado.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
