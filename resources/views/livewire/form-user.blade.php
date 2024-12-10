<div class="my-4 mx-8">

    <h3 class="semibold mb-5">{{ $title }}</h3>
    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">


         <!-- Acordeón Básico -->
        <hr class="my-4">
        <div class="accordion accordion-flush accordion-parent" id="accordionFlushExample">
            <!-- Item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button py-4 collapsed d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                        aria-controls="flush-collapseOne">
                        <span class="number-accordion rounded-circle me-3">
                            1
                        </span>
                        <span class="text-wrapper-accordion" style="color:black;">
                            Datos personales
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- init contenido acordeon-body -->
                        <hr class="mb-4">

                        <div class="pb-5 pt-2">
                            <span>Este módulo muestra los datos personales obtenidos del registro, no se pueden modificar.</span>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label frame-text">
                                    <strong>
                                        Nombres
                                    </strong>
                                </label>
                                <input type="text" class="form-control" id="nombres" wire:model="nombres" readonly style="background-color: #f0f0f0; color: #6e6e6e;">
                                @error('nombres') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label frame-text">
                                    <strong>
                                        Apellidos
                                    </strong>
                                </label>
                                <input type="text" class="form-control" id="apellidos" wire:model="apellidos" readonly style="background-color: #f0f0f0; color: #6e6e6e;">
                                @error('apellidos') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label frame-text">
                                    <strong>
                                        Rut
                                    </strong>
                                </label>
                                <input type="text" class="form-control" id="rut" wire:model="rut" readonly style="background-color: #f0f0f0; color: #6e6e6e;">
                                @error('rut') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label frame-text">
                                    <strong>
                                        Fecha de Nacimiento
                                    </strong>
                                </label>
                                <input type="text" class="form-control" id="fecha_nacimiento" wire:model="fecha_nacimiento" readonly style="background-color: #f0f0f0; color: #6e6e6e;">
                                @error('fecha_nacimiento') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label frame-text">
                                    <strong>
                                        Género
                                    </strong>
                                </label>
                                <input type="text" class="form-control" id="genero" wire:model="genero" readonly style="background-color: #f0f0f0; color: #6e6e6e;">
                                @error('genero') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label frame-text">
                                    <strong>
                                        Correo Institucional
                                    </strong>
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <input type="text" class="form-control" id="correo" placeholder="Escribe el correo institucional" wire:model="correo">
                                @error('correo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="alert alert-primary mt-2" role="alert">
                            <span class="material-icons icon-info pe-2">info</span>Debes usar un correo institucional para el registro, no se aceptan correos personales.
                        </div>

                        <hr class="my-4">

                        <div class="row mb-5">
                            <div class="col-4">
                                <label class="form-label frame-text">
                                    <strong>
                                        Telefono
                                    </strong>
                                </label>
                                <input type="text" class="form-control" id="telefono" placeholder="Escribe el telefono" wire:model="telefono">
                                @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-8">
                                <label class="form-label frame-text">
                                    <strong>
                                        Cargo
                                    </strong>
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <input type="text" class="form-control" id="cargo" placeholder="Escribe el cargo" wire:model="cargo">
                                @error('cargo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- fin contenido acordeon-body -->
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button py-4 collapsed d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                        aria-controls="flush-collapseTwo">
                        <span class="number-accordion rounded-circle me-3">
                            2
                        </span>
                        <span class="text-wrapper-accordion" style="color:black;">
                            Asignar el rol(es) para el usuario:
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- init contenido acordeon-body -->

                        <hr class="mb-4">

                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label frame-text mb-4">
                                    <strong>
                                        Selecciona el Rol
                                    </strong>
                                    <i class="material-icons label-info-icon">
                                        info
                                    </i>
                                </label>
                                <br>
                                @foreach ($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="role-{{ $role }}" value="{{ $role }}"
                                        wire:model="selectedRole" wire:change.prevent="toggleEspecialRoles">
                                        <label class="form-check-label" for="role-{{ $role }}">{{ $role }}</label>
                                    </div>
                                @endforeach
                                @error('selectedRole') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <hr class="pb-4 mt-4">
                            <div class="col-12 mb-3">
                                @foreach ($rolesespeciales as $especialRole)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="especialRole" id="especial-role-{{ $especialRole }}" value="{{ $especialRole }}"
                                        wire:model="selectedEspecialRole" {{ !$especialRolesEnabled ? 'disabled' : '' }} wire:change.prevent="toggleEspecialRoles">
                                        <label class="form-check-label" for="especial-role-{{ $especialRole }}">{{ $especialRole }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- fin contenido acordeon-body -->
                    </div>
                </div>
            </div>

             <!-- Item 3 -->
             <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button py-4 collapsed d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                        aria-controls="flush-collapseThree">
                        <span class="number-accordion rounded-circle me-3">
                            3
                        </span>
                        <span class="text-wrapper-accordion" style="color:black;">
                            Asignar institución(es) a este usuario
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- init contenido acordeon-body -->
                        <hr class="mb-4">

                        <div class="row mb-4">

                            <div class="col-md-6">
                                <div class="mb-4 custom-frame-box" style="height: 400px; overflow-y: auto;">
                                    <label class="form-label">
                                        <strong>
                                            Listado de instituciones
                                        </strong>
                                        <i class="material-icons label-info-icon">
                                            info
                                        </i>
                                    </label>

                                    <input type="text" class="form-control mb-4" placeholder="Buscar la institución" wire:model="searchInstituciones"  wire:keydown="changeSearchInstituciones">

                                    @foreach ($filteredInstituciones as $institucion)
                                        <div class="form-check mb-4">
                                            <input type="checkbox" class="form-check-input"
                                                id="institucion-{{ $loop->index }}"
                                                wire:click="action"
                                                wire:model="selectedInstituciones"
                                                value="{{ $institucion }}">
                                            <label class="form-check-label" for="institucion-{{ $loop->index }}">{{ $institucion }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-4 custom-frame-box" style="height: 400px; overflow-y: auto;">

                                    <label class="form-label mt-2 mb-3"><strong>Instituciones seleccionadas</strong></label>

                                    @forelse ($selectedInstituciones as $institucion)
                                        <div  class="custom-badge-primary-round">
                                            <span class="badge-close-btn" wire:click="removeInstitucion('{{ $institucion }}')">&times;</span>
                                            {{ $institucion }}
                                    </div>
                                    @empty

                                    @endforelse

                                </div>
                            </div>
                        </div>


                        <!-- fin contenido acordeon-body -->
                    </div>
                </div>
            </div>

            <!-- Item 4 Oculto -->
            @if ($sectoresEnabled)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSectores">
                        <button class="accordion-button py-4 collapsed d-flex align-items-center" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSectores" aria-expanded="false"
                            aria-controls="flush-collapseSectores">
                            <span class="number-accordion rounded-circle me-3">
                                4
                            </span>
                            <span class="text-wrapper-accordion" style="color:black;">
                                Asignar sector(es) a este usuario
                            </span>
                        </button>
                    </h2>
                    <div id="flush-collapseSectores" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingSectores" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <!-- Inicio contenido acordeón-body -->
                            <hr class="mb-4">

                            <div class="row mb-4">

                                <div class="col-md-6">
                                    <div class="mb-4 custom-frame-box" style="height: 400px; overflow-y: auto;">
                                        <label class="form-label">
                                            <strong>
                                                Listado de sectores
                                            </strong>
                                            <i class="material-icons label-info-icon">
                                                info
                                            </i>
                                        </label>

                                        <input type="text" class="form-control mb-4" placeholder="Buscar un sector" wire:model="searchSectores" wire:keydown="changeSearchSectores">

                                        @foreach ($filteredSectores as $sector)
                                            <div class="form-check mb-4">
                                                <input type="checkbox" class="form-check-input"
                                                    id="sector-{{ $loop->index }}"
                                                    wire:click="action"
                                                    wire:model="selectedSectores"
                                                    value="{{ $sector }}">
                                                <label class="form-check-label" for="sector-{{ $loop->index }}">{{ $sector }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-4 custom-frame-box" style="height: 400px; overflow-y: auto;">
                                        <label class="form-label mt-2 mb-3"><strong>Sectores seleccionados</strong></label>

                                        @forelse ($selectedSectores as $sector)
                                            <div class="custom-badge-primary-round">
                                                <span class="badge-close-btn" wire:click="removeSector('{{ $sector }}')">&times;</span>
                                                {{ $sector }}
                                            </div>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>

                            </div>
                            <!-- Fin contenido acordeón-body -->
                        </div>
                    </div>
                </div>
            @endif

            <!-- Item 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button py-4 collapsed d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false"
                        aria-controls="flush-collapseFour">
                        <span class="number-accordion rounded-circle me-3">
                            {{ $sectoresEnabled ? 5 : 4 }}
                        </span>
                        <span class="text-wrapper-accordion" style="color:black;">
                            Asignar permisos especiales
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- init contenido acordeon-body -->

                        <hr class="mb-4">

                        @if($showTextAdminUsuarios)
                            <div class="pb-4">
                                <span>Otorga permisos específicos a un usuario para realizar acciones avanzadas en la plataforma.</span>
                            </div>

                            <hr class="mb-4">

                        @endif

                        @if($competenciasPrivilegiosEnabled)

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label frame-text mb-4">
                                        <strong>
                                            Selecciona(s) la(s) competencia/privilegio
                                        </strong>
                                        <i class="material-icons label-info-icon">
                                            info
                                        </i>
                                    </label>
                                    <br>
                                    @foreach ($competenciasPrivilegios as $competencia)
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" name="competenciasPrivilegios[]" id="competencia-{{ $competencia }}" value="{{ $competencia }}"
                                            wire:model="selectedCompetenciasPrivilegios" wire:change.prevent="handleCompetenciasChange">
                                            <label class="form-check-label" for="competencia-{{ $competencia }}">{{ $competencia }}</label>
                                        </div>

                                        @if ($competencia == 'Postulador al S.N.I' && $showRegionesSelect)
                                            <label class="form-label frame-text">
                                                <strong>
                                                    Selecciona la región para asignar esta competencia
                                                </strong>
                                                <i class="material-icons label-info-icon">
                                                    info
                                                </i>
                                            </label>
                                            <select class="form-select mb-4" id="region" wire:model="selectedRegionesCompetencias">
                                                <option value="">Selecciona una región</option>
                                                @foreach ($regiones as $region)
                                                    <option value="{{ $region }}">{{ $region }}</option>
                                                @endforeach
                                            </select>
                                        @endif

                                        @if ($competencia == 'Autorizador de RATE' && $showInstitucionesSelect)
                                            <label class="form-label frame-text">
                                                <strong>
                                                    Selección Institución para asignar esta competencia
                                                </strong>
                                                <i class="material-icons label-info-icon">
                                                    info
                                                </i>
                                            </label>
                                            <select class="form-select mb-4" id="instituto" wire:model="selectedInstitucionesCompetencias">
                                                <option value="">Selecciona una institución</option>
                                                @foreach ($instituciones as $instituto)
                                                    <option value="{{ $instituto }}">{{ $instituto }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <hr class="mb-4">

                        @endif

                        @if($showTextAdminNacional)
                            <div class="alert alert-primary mt-2" role="alert">
                                <span class="material-icons icon-info pe-2">info</span>Este rol de Administrador Nacional tiene todos los permisos y accesos a toda la plataforma BIIP
                            </div>
                        @endif

                        @if(!$showTextAdminNacional)
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label frame-text mb-4">
                                        <strong>
                                            Selecciona los permisos especiales
                                        </strong>
                                        <i class="material-icons label-info-icon">
                                            info
                                        </i>
                                    </label>
                                    <br>
                                    @foreach ($permisosEspeciales as $permiso)
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" name="permisosEspeciales[]"
                                                id="permiso-{{ $permiso }}" value="{{ $permiso }}" wire:model="selectedPermisosEspeciales">
                                            <label class="form-check-label" for="permiso-{{ $permiso }}">{{ $permiso }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- fin contenido acordeon-body -->
                    </div>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button py-4 collapsed d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false"
                        aria-controls="flush-collapseFive">
                        <span class="number-accordion rounded-circle me-3">
                            {{ $sectoresEnabled ? 6 : 5 }}
                        </span>
                        <span class="text-wrapper-accordion" style="color:black;">
                            Asignar permisos temporales
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- init contenido acordeon-body -->
                        <hr class="mb-4">

                        <div class="pb-4">
                            <span>Otorga permisos o roles con una duración específica, estableciendo fechas de inicio y fin</span>
                        </div>

                        <div class="row mb-4">
                            <div class="col-5">
                                <label class="form-label frame-text">
                                    <strong>
                                        Rol / permiso
                                    </strong>
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <select class="form-select mb-4" id="selectedpermisosTemporales"
                                 wire:model="selectedpermisosTemporales" wire:change.prevent="changeSelectedpermisosTemporales">
                                    <option value="">Seleccionar el rol y/o permiso</option>
                                    @foreach ($permisosTemporales as $permisos)
                                        <option value="{{ $permisos }}">{{ $permisos }}</option>
                                    @endforeach
                                </select>
                                @error('selectedpermisosTemporales') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-3">
                                <label class="form-label frame-text">
                                    <strong>
                                        Fecha de inicio
                                    </strong>
                                    <span class="required">
                                        *
                                    </span>
                                </label>

                                <input type="date" id="fechaInicio" class="form-control" wire:model="fechaInicio"/>
                                @error('fechaInicio') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-3">
                                <label class="form-label frame-text">
                                    <strong>
                                        Fecha de finalización
                                    </strong>
                                    <span class="required">
                                        *
                                    </span>
                                </label>

                                <input type="date" id="fechaFin" class="form-control" wire:model="fechaFin"/>
                                @error('fechaFin') <span class="text-danger">{{ $message }}</span> @enderror

                            </div>
                            <div class="col-1 text-center align-content-center flex-wrap">
                                <button type="button" wire:click.prevent="addPermisoTemporal" class="btn button-add-table">+</button>
                            </div>
                        </div>

                        @if ($showRegionesTemporalSelect)
                            <hr class="mb-4">

                            <div class="row pb-4">
                                <div class="col-12">
                                    <label class="form-label frame-text">
                                        <strong>
                                            Selecciona la región para asignar esta competencia
                                        </strong>
                                        <i class="material-icons label-info-icon">
                                            info
                                        </i>
                                    </label>
                                    <select class="form-select" id="region" wire:model="selectedRegionesCompetenciasTemporal">
                                        <option value="">Selecciona una región</option>
                                        @foreach ($regiones as $region)
                                            <option value="{{ $region }}">{{ $region }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedRegionesCompetenciasTemporal') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif


                        @if ($showInstitucionesTemporalSelect)
                            <hr class="mb-4">
                            <div class="row pb-4">
                                <div class="col-12">

                                    <label class="form-label frame-text">
                                        <strong>
                                            Selección Institución para asignar esta competencia
                                        </strong>
                                        <i class="material-icons label-info-icon">
                                            info
                                        </i>
                                    </label>
                                    <select class="form-select" id="instituto" wire:model="selectedInstitucionesCompetenciasTemporal">
                                        <option value="">Selecciona una institución</option>
                                        @foreach ($instituciones as $instituto)
                                            <option value="{{ $instituto }}">{{ $instituto }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedInstitucionesCompetenciasTemporal') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif

                        <div class="row pb-4">
                            <table class="table tabla-resultados">
                                <thead>
                                    <tr>
                                        <th>Permiso temporal</th>
                                        <th class="text-center">Asignación</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de fin</th>
                                        <th class="text-center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($permisosTemporalesData as $data)
                                    <tr>
                                        <td><strong>{{ $data['permiso'] }}</strong></td>
                                        <td class="text-center">{{ $data['asignacion'] }}</td>
                                        <td><strong>{{ $data['fecha_inicio'] }}</strong></td>
                                        <td><strong>{{ $data['fecha_finalizacion'] }}</strong></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary btn-sm" wire:click.prevent="removePermiso({{ $loop->index }})">
                                                    <span class="material-icons">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">

                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>


                        <!-- fin contenido acordeon-body -->
                    </div>
                </div>
            </div>



        <div class="d-flex justify-content-between mt-5">

        <a href="#" class="btn btn-secondary btn-lg">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary btn-lg">
            <span class="text-button-biip">
                {{ $isEdit ? 'Guardar cambios' : 'Crear usuario'  }}
            </span>
        </button>

        </div>

    </form>
</div>
