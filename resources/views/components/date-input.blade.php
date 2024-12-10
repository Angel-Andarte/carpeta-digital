@props([
    'model' => '',
    'id' => null,
    'accion' => ''
])


    <input
        type="date"
        id="{{ $id }}"
        placeholder="DD/MM/AAAA"
        class="form-control"
        {{ $model ? "wire:model=$model" : '' }}
        {{ $accion }}
    />

