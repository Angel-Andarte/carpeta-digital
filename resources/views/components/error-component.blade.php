<div class="text-center">
    <div class="alert alert-warning p-4">
        <div class="alert-icon my-3">
            <div class="icon-circle">
              <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
            </div>
        </div>

        <p class="mb-0"><strong>No pudimos subir el documento</strong></p>
        <small class="text-muted d-block mb-4">El archivo puede ser demasiado grande, recuerda que el <strong>tamaño máximo es de 32GB</strong></small>

        <button type="button" class="btn-custom d-block mx-auto mb-3" wire:click.prevent="retryUpload">Intentarlo de nuevo</button>
    </div>
</div>
