<div
    x-cloak
    x-data="dropzone({
        _this: @this,
        uuid: @js($uuid),
        multiple: @js($multiple),
        offline: !navigator.onLine,
    })"
    x-init="
        setInterval(() => {
            offline = !navigator.onLine;
            if (offline) {
               @this.call('handleNetworkError');
            }
        }, 2000);
    "
    @dragenter.prevent.document="onDragenter($event)"
    @dragleave.prevent="onDragleave($event)"
    @dragover.prevent="onDragover($event)"
    @drop.prevent="onDrop"
    class="w-100 antialiased"
>

<template x-if="offline">
    @if($errorConectionFail)
    <x-error-conetion-fail-component />
    @endif
</template>

@if($uploadSectionVisible)

<div class="row">

    @if ($alertError)
    <div class="col-md-12">
        <div class="alert alert-warning d-flex align-items-center" role="alert" style="border: 1px solid #fac323; background-color: rgba(250, 195, 35, 0.1);">
            <i class="fas fa-exclamation-triangle me-2" style="color: #fac323; font-size: 1.3rem;"></i>
            <div>
                {!! $errorMessage !!}
            </div>
        </div>
    </div>
    @endif

    <div class="col-md-6">
        <x-text-component :carpeta="$carpeta" :formatos="str_replace(',', ', ', $formatos)" :tamanoMax="round($tamanoMax / 1024)"/>
    </div>

    <div class="col-md-6">
        <div class="upload-box">

             <div class="py-10 px-10 d-flex flex-column align-items-center h-100 w-100 max-w-2xl justify-content-center bg-white">

                <div @click="$refs.input.click()" class="w-100 cursor-pointer">
                    <img src="{{ asset('modal.jpg') }}" alt="Subir archivo" class="upload-image">
                    <p class="my-4"><strong> Arrastra el archivo para subirlo </strong></br> o haz clic para buscarlo</p>

                    <!-- Input de archivo -->


                    <input
                    x-ref="input"
                    wire:model="upload"
                    type="file"
                    class="dz-hidden"
                    x-on:livewire-upload-start="isLoading = true; loadingPercentage = 0; progress: 0"
                        x-on:livewire-upload-finish="isLoading = true; loadingPercentage = 100"
                        x-on:livewire-upload-error="console.log('livewire-dropzone upload error', error); isLoading = false;"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                             wire:change="initUpload()"
                            @if(!is_null($this->accept)) accept="{{ $this->accept }}" @endif
                            @if($multiple === true) multiple @endif
            >


                    <div x-show="isLoading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>



                    <a href="#" class="btn btn-primary mb-2">
                        Subir Documento
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

@endif


@if($formVisible)
<x-form-component  :years="$years" :files="$files" :confirmingDelete="$confirmingDelete" :fileName="$fileName"/>
@endif

@if($errorDuplicateContent)
    <x-error-duplicate-component />
@endif


@if(!is_null($error))
<div class="row">
    @if($errorSizeContent)
        <x-error-component />
    @endif

    @if($errorFormatContent)
        <x-error-format-component :format="$this->accept()"/>
    @endif
</div>
@else

@endif
@script
<script>
    Alpine.data('dropzone', ({ _this, uuid, multiple }) => {
        return ({
            isDragging: false,
            isDropped: false,
            isLoading: false,
            loadingPercentage: 0,

            onDrop(e) {
                $wire.set('formVisible', true);

                this.isDropped = true
                this.isDragging = false
                //$wire.set('formVisible', true);
                $wire.initUpload();


                const file = multiple ? e.dataTransfer.files : e.dataTransfer.files[0]



                const args = ['upload', file, () => {
                    // Upload completed
                    this.isLoading = false
                    this.loadingPercentage = 100;

                }, (error) => {
                    // An error occurred while uploading
                    console.log('livewire-dropzone upload error', error);

                }, () => {
                    // Uploading is in progress
                    this.isLoading = true
                    this.loadingPercentage = progress;
                    //$wire.initUpload();

                }];

                // Upload file(s)
                multiple ? _this.uploadMultiple(...args) : _this.upload(...args)

            },
            onDragenter() {
                this.isDragging = true
            },
            onDragleave() {
                this.isDragging = false
            },
            onDragover() {
                this.isDragging = true
            },
            removeUpload(tmpFilename) {
                // Dispatch an event to remove the temporarily uploaded file
                _this.dispatch(uuid + ':fileRemoved', { tmpFilename })
            },
        });
    })
</script>
@endscript
</div>
