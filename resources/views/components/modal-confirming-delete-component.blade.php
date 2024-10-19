<div class="modal fade show"  style="display: block;  background: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close custom-close-black" wire:click="$set('confirmingDelete', false)">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">

                <div class="text-center">
                    <div>
                        <div class="alert-icon mb-3">
                            <div class="icon-circle">
                              <i class="fas fa-upload fa-2x text-warning"></i>
                            </div>
                        </div>

                        <p class="mb-4"><strong>¿Estas seguro de que deseas cancelar la subida de este documento?</strong></p>

                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn-custom-outline mx-2" wire:click.prevent="$set('confirmingDelete', false)">Seguir Subiendo</button>
                            <button type="button" class="btn-custom mx-2" wire:click.prevent="removeFileUpload">Cancelar Subida</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
