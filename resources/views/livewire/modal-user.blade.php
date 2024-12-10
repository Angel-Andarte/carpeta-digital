<div>
    <div>
        <!-- Modal -->
        @if($showModal)
            <div class="modal fade show" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true" style="display: block;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Encabezado del Modal -->
                        <div class="modal-header">
                            <div class="avatar">{{ substr($user['nombres'], 0, 1) }}{{ substr($user['apellidos'], 0, 1) }}</div>
                            <div class="modal-title">
                                <h2>{{ $user['nombres'] }} {{ $user['apellidos'] }}</h2>
                                <p class="email">{{ $user['email'] }}</p>
                                <span class="role">{{ $user['rol'] ?? 'Sin rol asignado' }}</span>
                            </div>
                            <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del Modal -->
                        <div class="modal-body">
                            <h3>Datos básicos:</h3>
                            <ul class="basic-info">
                                <li><strong>RUT:</strong> {{ $user['rut'] }}</li>
                                <li><strong>Fecha de Nacimiento:</strong> {{ $user['fecha_nacimiento'] }}</li>
                                <li><strong>Género:</strong> {{ $user['genero'] }}</li>
                                <li><strong>Teléfono:</strong> {{ $user['telefono'] }}</li>
                            </ul>

                            <h3>Instituciones Asociadas:</h3>
                            <ul class="institutions">
                                @foreach ($user['instituciones'] as $institucion)
                                    <li>{{ $institucion }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Pie del Modal -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Ir al perfil del usuario</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
