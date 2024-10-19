<div x-data="{ show: false }" x-init="show = true; setTimeout(() => show = false, 1053000)"
    x-show="show"
    class="custom-alert alert-dismissible fade show m-3"
    role="alert">
   <div class="d-flex align-items-center">
        @if($title =="success")
            <span class="material-icons me-2 green-icon">check_circle</span>
        @else
            <span class="material-icons me-2 red-icon">cancel</span>
        @endif
       <span>{{ $message }}</span>
   </div>
   <button type="button" class="alert-btn-close d-flex align-items-center justify-content-center" aria-label="Close" @click="show = false">
        <span class="material-icons">
            close
        </span>
   </button>
</div>
