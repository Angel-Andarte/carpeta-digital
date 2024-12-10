<div class="container">
    <div class="p-2">
        <div class="col-lg-12">
            <div class="card p-3">

                <div class="card-body">

                    <p class="title">Gestion de roles</p>

                    <p class="text-muted">Asigna y configura roles de usuario, definiendo accesos y permisos especificos</p>
                    <p class="text-muted">Aqui podras asegurate de que cada usuario tenga las herramientas necesarias segun sus responsabilidades en la plataforma</p>

                    <a href="{{ route('role.create') }}"  class="btn btn-primary mt-4 mb-1">
                        <i class="fas fa-plus text-white"></i>
                        Crear nuevo rol</a>

                    <hr class="my-4">

                    <div class="row">
                        @foreach ($roles as $role)
                            <div class="col-4 my-2">
                                <div class="card shadow" style="width: auto;">
                                    <div class="card-body">
                                        <p class="custom-card-title mb-5">{{ $role['name'] }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="text-muted">Total usuarios:</p>
                                                <p class="fw-bold mb-0">{{ $role['cant'] }}</p>
                                            </div>
                                            <a  href="{{ route('role.edit', $role['id']) }}" class="btn btn-primary">Ir a gestionar el rol</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (session()->has('message'))
                        <x-alert :message="session('message')" />
                    @endif

                </div>


            </div>
        </div>
    </div>
</div>
