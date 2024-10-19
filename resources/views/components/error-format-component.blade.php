@props(['format' => ''])

<div class="text-center">
    <div class="alert alert-warning p-4">
        <div class="alert-icon my-3">
            <div class="icon-circle">
              <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
            </div>
        </div>

        <p class="mb-0"><strong>No pudimos subir el documento</strong></p>
        <small class="text-muted d-block mb-4">El formato no es compatible, recuerda que las extensiones permitidas son <strong>{{ $format }}</strong></small>

        <button type="button" class="btn-custom d-block mx-auto mb-3" wire:click.prevent="retryUpload">Intentarlo de nuevo</button>
    </div>
</div>
