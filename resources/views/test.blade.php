<div>estamos en test</div>

@if (in_array('view-admin1', $userPermissions))
    <p>Contenido exclusivo para usuarios con el permiso 'view-admin'.</p>
@endif
