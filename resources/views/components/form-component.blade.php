@props(['years', 'files', 'confirmingDelete', 'fileName'])

    <form wire:submit.prevent="submitForm">


        <div class="file-upload">
            <div class="file-details">
                <div class="file-icon">
                    <i class="far fa-arrow-alt-circle-up"></i>
                </div>
                <span class="file-name">{{ $fileName }}</span>
                <span class="file-status" x-text="loadingPercentage === 100 ? 'Completado' : 'Subiendo...'"></span>
                <div class="file-delete">
                    <i class="fas fa-trash"
                    wire:click.prevent="confirmDelete('{{ $fileName }}')"
                    role="button"
                    aria-label="Eliminar archivo"></i>
                </div>
            </div>
            <div class="file-progress-bar">
                <div class="progress" :style="{ width: loadingPercentage + '%', backgroundColor: loadingPercentage === 100 ? '#48bb78' : '#3182ce' }"></div>
            </div>
        </div>

        @if ($confirmingDelete)
        <x-modal-confirming-delete-component/>
        @endif



<hr class="my-3"/>

<div class="mt-3">
    <label class="form-label"><strong> Selecciona el año presupuestario que corresponde</strong></label>
    <div class="d-flex flex-wrap">
        @foreach($years as $yearOption)
            <div class="form-check me-3">
                <input class="form-check-input" type="radio" wire:model="year" id="year{{ $yearOption }}" name="year" value="{{ $yearOption }}">
                <label class="form-check-label" for="year{{ $yearOption }}">
                    {{ $yearOption }}
                </label>
            </div>
        @endforeach
    </div>
    @error('year')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<hr class="my-3"/>
<div class="mt-3">
    <label for="textArea" class="form-label"><strong>Menciona brevemente el contenido de este documento o agrega alguna observacion</strong></label>
    <textarea wire:model="textArea" id="textArea" class="form-control" rows="3"></textarea>
    @error('textArea')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="modal-footer mt-3">
    <a href="#" class="btn btn-custom-outline" wire:click="$dispatch('closeModal')">Cancelar</a>
    <button type="submit" class="btn-custom">Subir documento</a>
</div>
</form>

