@props([
    'carpeta' => 'Carpeta',
    'formatos' => ['doc', 'pdf', 'ppt', 'dwg', 'kml'],
    'tamanoMax' => '32 MB'
])

<div class="important-box">
    <h6><i class="fas fa-folder-open blue-icon"></i> ¡Importante!</h6>
    <ul>
        <li>Formatos permitidos: <strong>{{ $formatos }}</strong>.</li>
        <li>Peso máximo del archivo: <strong>{{ $tamanoMax }} MB</strong>.</li>
        <li>Asegúrate de que <strong>el documento tenga un nombre claro y distintivo que no coincida con el de otro archivo.</strong></li>
        <li>Para subir más de un archivo, debe hacerse a través de una carpeta comprimida.</li>
    </ul>
    <div class="mt-4">
        <h6><i class="fas fa-exclamation-circle blue-icon"></i> Carpeta Anexos</h6>
        <p>En la carpeta "{{ $carpeta }}" deben subirse fichas técnicas, términos de referencia, presupuestos y otros antecedentes relevantes para el análisis del proyecto.</p>
    </div>
</div>
