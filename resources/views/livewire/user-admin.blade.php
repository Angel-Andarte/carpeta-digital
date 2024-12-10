<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Administrador de usuarios BIIP</h2>

    <div class="flex items-center space-x-4 mb-6">
        <input
            type="text"
            wire:model="search"
            wire:keydown="filterUsers"
            class="border rounded-lg px-4 py-2"
            placeholder="Buscar un usuario (RUT o Nombre)"
        >
        <button class="bg-gray-300 px-4 py-2 rounded-lg">Exportar datos</button>
        <button class="bg-blue-700 text-white px-4 py-2 rounded-lg">Crear nuevo usuario</button>
    </div>

    @if(empty($filteredUsers))
        <div class="text-center p-10 border rounded-lg">
            <p class="text-gray-600">No encontramos ningún usuario con los datos ingresados</p>
        </div>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">RUT</th>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Correo</th>
                    <th class="border border-gray-300 px-4 py-2">RUT</th>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">RUT</th>

                </tr>
            </thead>
            <tbody>
                @foreach($filteredUsers as $user)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">
                        <div>
                            <span class="block">{{ $user['rut'] }}</span>
                            <span class="block">{{ $user['name'] }}</span>
                            <span class="block">{{ $user['email'] }}</span>

                        </div>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        @foreach($user['roles'] as $role)
                            <span>{{ $role }}</span>@if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user['instituciones'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user['estado'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user['fecha_de_creacion'] }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                        <!-- Botón de Ver -->
                        {{-- <button
                            wire:click="viewUser({{ $user['rut'] }})"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Ver
                        </button> --}}

                        <button wire:click="viewUser('{{ $user['rut'] }}')" class="btn-custom"> Ver </button>

                        <!-- Botón de Editar -->
                        <button
                            wire:click="editUser({{ $user['rut'] }})"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                            Editar
                        </button>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    @endif

    @livewire('modal-user')
</div>
