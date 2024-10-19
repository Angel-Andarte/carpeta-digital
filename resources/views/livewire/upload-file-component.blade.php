<div>
    <button class="btn btn-primary" wire:click="openModal">Abrir Modal</button>

    <div>
        @if(session()->has('toast'))
            <x-toast title="{{ session('toast.title') }}" message="{{ session('toast.message') }}" />
        @endif
    </div>

    @if($showModal)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Subir documento</h3>
                        <button type="button" class="btn-close custom-close" wire:click="closeModal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <livewire:custom-dropzone
                        wire:model="upload"
                        :rules="['mimes:png,jpeg,doc,pdf,ppt,dwg,kml,mov','max:320768']"
                        :multiple="false" />

                    </div>
                </div>
            </div>
        </div>
    @endif




<div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


</div>

@if ($documents->isNotEmpty())
<div class="mt-5">
    <h4>Documentos Cargados</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Formato</th>
                <th>Versión</th>
                <th>Tamaño (bytes)</th>
                <th>Año</th>
                <th>Descripción</th>
                <th>Modificado por</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{ $document->name }}</td>
                    <td>{{ $document->format }}</td>
                    <td>{{ $document->version }}</td>
                    <td>{{ $document->size }}</td>
                    <td>{{ $document->year }}</td>
                    <td>{{ $document->description }}</td>
                    <td>{{ $document->modified_by }}</td>
                    <td>{{ $document->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

</div>
