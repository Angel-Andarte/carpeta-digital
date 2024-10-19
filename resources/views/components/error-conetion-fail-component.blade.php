<div class="text-center">
    <div class="alert alert-orange p-4">
        <div class="alert-icon my-3">
            <div class="icon-circle-orange">
                <i class="fas fa-exclamation-triangle fa-2x" style="color: #ffa007;"></i>
            </div>
        </div>

        <p class="mb-0"><strong>La conexión a internet es inestable, por favor, siga estos pasos</strong></p>

        <div class="text-left pb-2" style="padding-left:110px; text-align: left;">
            <ol>
                <li><small>1. Verifique si otros dispositivos tambien tienen problemas de conexion.</small></li>
                <li><small>2. Reinicie su modem o router.</small></li>
                <li><small>3. Asegurece de estar cerca del router para una mejor señal.</small></li>
                <li><small>4. Contacte a su proveedor de internet si el problema persiste.</small></li>
            </ol>
        </div>

        <button type="button" class="btn-custom d-block mx-auto my-3" wire:click.prevent="retryUpload">Intentarlo de nuevo</button>
    </div>
</div>
