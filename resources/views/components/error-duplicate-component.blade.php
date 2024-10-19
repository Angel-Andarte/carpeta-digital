<div class="text-center">
    <div class="alert alert-warning p-4">
        <div class="alert-icon my-3">
            <div class="icon-circle">
              <i class="fas fa-file-alt fa-2x text-warning"></i>
            </div>
        </div>

        <p class="mb-0"><strong>El archivo que intentas subir ya existe con el mismo nombre</strong></p>
        <small class="text-muted d-block mb-4">¿Esta es una nueva version del documento?</small>

        <div class="d-flex justify-content-center">
            <button type="button" class="btn-custom-outline mx-2" wire:click.prevent="retryUpload">Es otro documento</button>
            <button type="button" class="btn-custom mx-2">Sí, es una nueva versión</button>
        </div>
    </div>
</div>
