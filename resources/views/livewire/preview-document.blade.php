<div>
    <button type="button" class="btn-custom" wire:click.prevent='generatePreviewUrl'>
        click aca
    </button>
    @if($previewUrl)
        <iframe src="{{ $previewUrl }}" width="100%" height="600px"></iframe>
    @else
        <p>No se pudo generar la vista previa del documento.</p>
    @endif
</div>
