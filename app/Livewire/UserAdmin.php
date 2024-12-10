<?php

namespace App\Livewire;

use Livewire\Component;

class UserAdmin extends Component
{
    public $search = '';
    public $users = [];
    public $filteredUsers = [];

    public function mount()
    {

        $this->users = [
            [
                'rut' => '12.345.678-9',
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'roles' => ['consulta'],
                'instituciones' => 'Agencia de calidad de la Educación',
                'estado' => 'vigente',
                'fecha_de_creacion' => '13/10/2008'
            ],
            [
                'rut' => '98.765.432-1',
                'name' => 'Ana Gómez',
                'email' => 'ana.gomez@example.com',
                'roles' => ['formulador', 'analista'],
                'instituciones' => 'Ministerio de Educación',
                'estado' => 'activo',
                'fecha_de_creacion' => '20/03/2015'
            ],
            [
                'rut' => '11.222.333-4',
                'name' => 'Carlos López',
                'email' => 'carlos.lopez@example.com',
                'roles' => ['financiero'],
                'instituciones' => 'Universidad de Chile',
                'estado' => 'inactivo',
                'fecha_de_creacion' => '05/07/2010'
            ],
        ];

        $this->filteredUsers = $this->users;
    }

    public function filterUsers()
    {
        if (empty($this->search)) {
            $this->filteredUsers = $this->users;
            return;
        }

        if (preg_match('/^\d[\d.-]*$/', $this->search)) {
            // Filtra por RUT si el input tiene números
            $this->filteredUsers = array_filter($this->users, function ($user) {
                return str_contains($user['rut'], $this->search);
            });
        } else {
            // Filtra por nombre si tiene letras
            $this->filteredUsers = array_filter($this->users, function ($user) {
                return stripos($user['name'], $this->search) !== false;
            });
        }
    }

    public function viewUser($rut)
    {
        $this->dispatch('showModalUser', $rut);
    }

    public function render()
    {
        return view('livewire.user-admin', ['filteredUsers' => $this->filteredUsers])->layout('layouts.app');
    }
}
