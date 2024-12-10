<div>
    <div>
        <!-- Modal -->
        @if($showModal)
            <div class="modal fade show" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true" style="display: block;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">Detalles del Usuario</h5>
                            <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li><strong>Nombre:</strong> {{ $user->name }}</li>
                                <li><strong>Email:</strong> {{ $user->email }}</li>
                                <li><strong>Rut:</strong> {{ $user->rut }}</li>
                                <!-- Añadir más campos según sea necesario -->
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


</div>
