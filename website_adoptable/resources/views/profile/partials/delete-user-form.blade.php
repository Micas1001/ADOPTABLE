<section class="mb-5">
    <div class="">
        <div class="">
            <h2 class="h5 mb-3 text-danger fw-bold">
                {{ __('Eliminar Conta') }}
            </h2>

            <p class="text-muted">
                {{ __('Uma vez que a sua conta for eliminada, todos os seus dados serão permanentemente apagados. Por favor, descarregue qualquer informação que deseje guardar antes de continuar.') }}
            </p>

            <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirmDeletionModal">
                {{ __('Eliminar Conta') }}
            </button>
        </div>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmDeletionModal" tabindex="-1" aria-labelledby="confirmDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="confirmDeletionModalLabel">{{ __('Tem a certeza que quer eliminar a conta?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('Uma vez que a conta for eliminada, todos os seus dados serão permanentemente removidos. Introduza a sua palavra-passe para confirmar.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" required>
                            @error('password', 'userDeletion')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Eliminar Conta') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
