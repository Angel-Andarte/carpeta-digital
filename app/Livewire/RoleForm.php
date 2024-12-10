<?php

namespace App\Livewire;

use Livewire\Component;

class RoleForm extends Component
{
    public $roleId;
    public $name, $description, $category;
    public $isEditing = false;
    public $categories = ['Gestion de iniciativas', 'Analisis de iniciativas', 'Ejecucion de iniciativas'];
    public $permissionCategory = [];
    public $permissions = [];

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|string|max:255',
        'category' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Debes ingresar una nombre para el rol.',
        'description.required' => 'Debes ingresar una descrpcion para el rol.',
    ];

    public function mount($roleId = null)
    {
        if ($roleId) {
            $this->isEditing = true;
            $this->roleId = $roleId;
            $this->loadRole();
        }

        $this->loadPermissions();
    }

    public function loadRole()
    {

        $roles = [
            1 => [
                'name' => 'Consulta',
                'description' => 'Consulta role',
                'category' => 'Gestión de iniciativas',
                'permissions' => [3, 6],
            ],
            2 => [
                'name' => 'Formulador',
                'description' => 'Formulador role',
                'category' => 'Análisis de iniciativas',
                'permissions' => [11, 12],
            ],
            3 => [
                'name' => 'Analista',
                'description' => 'Analista role',
                'category' => 'Ejecución de iniciativas',
                'permissions' => [14, 16],
            ],
        ];

        $role = $roles[$this->roleId] ?? null;

        if ($role) {
            $this->name = $role['name'];
            $this->description = $role['description'];
            $this->category = $role['category'];
            $this->permissions = $role['permissions'];
        }
    }

    public function loadPermissions()
    {
        $this->permissionCategory = [
            'Gestión de iniciativas' => [
                'IDI' => [
                    ['id' => 1, 'name' => 'Seleccionar todos'],
                    ['id' => 2, 'name' => 'Editar IDI'],
                    ['id' => 3, 'name' => 'Ver ficha IDI vigente'],
                    ['id' => 4, 'name' => 'Consultar georreferenciación'],
                    ['id' => 5, 'name' => 'Eliminar IDI'],
                ],
                'Programación' => [
                    ['id' => 6, 'name' => 'Seleccionar todos'],
                    ['id' => 7, 'name' => 'Permiso 2'],
                    ['id' => 8, 'name' => 'Permiso 3'],
                    ['id' => 9, 'name' => 'Permiso 4'],
                    ['id' => 10, 'name' => 'Permiso 5'],
                ],
                'Resultados por etapa' => [
                    ['id' => 11, 'name' => 'Seleccionar todos'],
                    ['id' => 12, 'name' => 'Permiso 2'],
                    ['id' => 13, 'name' => 'Permiso 3'],
                    ['id' => 14, 'name' => 'Permiso 4'],
                    ['id' => 15, 'name' => 'Permiso 5'],
                ],
                'Solicitudes' => [
                    ['id' => 16, 'name' => 'Seleccionar todos'],
                    ['id' => 17, 'name' => 'Permiso 2'],
                    ['id' => 18, 'name' => 'Permiso 3'],
                    ['id' => 19, 'name' => 'Permiso 4'],
                    ['id' => 20, 'name' => 'Permiso 5'],
                ],
                'Carpeta digital' => [
                    ['id' => 21, 'name' => 'Seleccionar todos'],
                    ['id' => 22, 'name' => 'Permiso 2'],
                    ['id' => 23, 'name' => 'Permiso 3'],
                    ['id' => 24, 'name' => 'Permiso 4'],
                    ['id' => 25, 'name' => 'Permiso 5'],
                ],
            ],
            'Análisis de iniciativas' => [
                'Permisos generales' => [
                    ['id' => 26, 'name' => 'Permiso 1'],
                    ['id' => 27, 'name' => 'Permiso 2'],
                    ['id' => 28, 'name' => 'Permiso 3'],
                ],
            ],
            'Ejecución de iniciativas' => [
                'Carpeta digital' => [
                    ['id' => 29, 'name' => 'Seleccionar todos'],
                    ['id' => 30, 'name' => 'Permiso 2'],
                    ['id' => 31, 'name' => 'Permiso 3'],
                    ['id' => 32, 'name' => 'Permiso 4'],
                    ['id' => 33, 'name' => 'Permiso 5'],
                ],
            ],
        ];
    }

    public function store()
    {
        $this->validate();

        $roleData = [
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'permissions' => $this->permissions,
        ];

        $jsonData = json_encode($roleData);

        session()->flash('message', 'Role created successfully!');

        $this->resetForm();

        return redirect()->route('role.list');
    }

    public function update()
    {
        $this->validate();

        $roleData = [
            'id' => $this->roleId,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'permissions' => $this->permissions,
        ];

        $jsonData = json_encode($roleData);

        session()->flash('message', 'Role updated successfully!');

        $this->resetForm();

        return redirect()->route('role.list');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->categories = '';
        $this->roleId = null;
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.role-form')->layout('layouts.app');
    }
}
