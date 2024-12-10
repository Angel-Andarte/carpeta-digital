<?php

namespace App\Livewire;

use Livewire\Component;

class RoleList extends Component
{
    public $roles = [];

    public function mount()
    {

        $this->roles = [
            ['id' => 1, 'name' => 'Consulta', 'cant' => '20495'],
            ['id' => 2, 'name' => 'Formulador', 'cant' => '2846'],
            ['id' => 3, 'name' => 'Analista', 'cant' => '895'],
            ['id' => 4, 'name' => 'Financiero', 'cant' => '2456'],
            ['id' => 5, 'name' => 'Administrador', 'cant' => '432'],
        ];
    }

    public function render()
    {
        return view('livewire.role-list')->layout('layouts.app');
    }
}
