<div>
    <div id="alertMessage" class="alert alert-dark alert-dismissible fade show position-fixed bottom-0 start-0 w-auto mx-3 my-3 p-2 d-flex align-items-center"
    role="alert" style="z-index: 1050;">
   <i class="bi bi-check-circle-fill text-success me-2"></i>
   <span>{{ $message }}</span>
   <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Cerrar"></button>
</div>

<script>

    setTimeout(function() {
        let alertMessage = document.getElementById('alertMessage');
        if (alertMessage) {
            alertMessage.classList.remove('show');
            alertMessage.classList.add('fade');
        }
    }, 5000);
</script>

</div>
