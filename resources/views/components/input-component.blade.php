@props(['multiple' => '', 'accept' => ''])

<input
                x-ref="input"
                wire:model="upload"
                type="file"
                class="d-none"
                x-on:livewire-upload-start="isLoading = true"
                x-on:livewire-upload-finish="isLoading = false"
                x-on:livewire-upload-error="console.log('livewire-dropzone upload error', error)"
                @if(!is_null($accept)) accept="{{ $accept }}" @endif
                @if($multiple === true) multiple @endif
                {{--  wire:change="$dispatch('fileSelected')"--}}
            >
