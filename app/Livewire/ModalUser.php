<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ModalUser extends Component
{
    public $rut;
    public $user; // Esta propiedad contendrá los datos del usuario
    public $showModal = false; // Controlador para mostrar u ocultar el modal

    protected $listeners = ['showModalUser'];

    // Función que se ejecuta cuando se hace clic en el botón "Ver"
    public function showModalUser($rut)
    {

        // Obtener los datos del usuario por su rut
        $this->user = [
            'nombres' => 'Antonia Fernanda',
            'apellidos' => 'Pérez Ramírez',
            'rut' => '12.749.625-K',
            'fecha_nacimiento' => '02/06/1975',
            'genero' => 'Femenino',
            'email'=> 'antoniafernanda@gmail.com',
            'telefono'=>'17262688990',
            'instituciones' => [
                'Instituto Nacional De La Juventud (inj)',
                'Ministerio de Desarrollo Social y Familia',
            ],
        ];

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
        return view('livewire.modal-user');
    }
}
