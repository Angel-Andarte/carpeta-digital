<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserModal extends Component
{
    public $rut;
    public $user; // Esta propiedad contendrá los datos del usuario
    public $showModal = false; // Controlador para mostrar u ocultar el modal

    protected $listeners = ['showModalUser'];

    // Función que se ejecuta cuando se hace clic en el botón "Ver"
    public function showModalUser($rut)
    {
        dd($rut);
        // Obtener los datos del usuario por su rut
        $this->user = User::where('rut', $rut)->first(); // Ajusta esto según tu modelo y base de datos

        // Mostrar el modal
        $this->showModal = true;
    }

    // Función para cerrar el modal
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.user-modal');
    }
}

