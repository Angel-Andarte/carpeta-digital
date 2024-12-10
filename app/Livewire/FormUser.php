<?php

namespace App\Livewire;

use Livewire\Component;

class FormUser extends Component
{
    public $userId;
    public $user = [
        'nombres' => 'juan',
        'apellidos' => 'perez',
        'rut' => '123',
        'fecha_nacimiento' => '12/44/4332',
        'genero' => 'femenino',
    ];

    public $userEdit = [
        'id' => 1,
        'nombres' => 'Carlos',
        'apellidos' => 'Gómez',
        'rut' => '12345678-9',
        'fecha_nacimiento' => '1985-05-10',
        'genero' => 'masculino',
        'correo' => 'carlos.gomez@example.com',
        'telefono' => '987654321',
        'cargo' => 'Analista de Datos',
        'role' => 'Analista',
        'especial_role' => 'Administrador de Usuarios',
        'instituciones' => ['Instituto A', 'Instituto C'],
        'sectores' => ['Sector 2', 'Sector 4'],
        'permisos_especiales' => ['Consulta avanzada carpeta digital'],
        'competencias_privilegios' => ['Postulador al S.N.I'],
        'regiones_competencias' => 'Valparaíso',
        'instituciones_competencias' => 'Instituto A',
        'permisos_temporales' => [
            [
                'permiso' => 'Postulador al S.N.I',
                'asignacion' => 'Valparaíso',
                'fecha_inicio' => '2024-01-01',
                'fecha_finalizacion' => '2024-12-31',
            ]
        ]
    ];

    public $isEdit = true;
    public $nombres;
    public $apellidos;
    public $rut;
    public $fecha_nacimiento;
    public $genero;
    public $correo;
    public $telefono;
    public $cargo;

    public $roles = ['Consulta', 'Formulador', 'Financiero', 'Analista'];
    public $rolesespeciales = ['Administrador de Usuarios', 'Administrador Regional', 'Administrador Nacional'];
    public $selectedRole = null;
    public $selectedEspecialRole = null;
    public $especialRolesEnabled = false;

    public $instituciones = [];
    public $selectedInstituciones = [];
    public $searchInstituciones = '';
    public $filteredInstituciones = [];

    public $sectores = [];
    public $selectedSectores = [];
    public $searchSectores = '';
    public $filteredSectores = [];
    public $sectoresEnabled = false;

    public $permisosEspeciales = [
        'Consulta avanzada carpeta digital',
        'Permiso especial #2',
        'Permiso especial #3'
    ];
    public $selectedPermisosEspeciales = [];

    public $competenciasPrivilegios = [
        'Postulador al S.N.I',
        'Autorizador de RATE'
    ];
    public $selectedCompetenciasPrivilegios = [];
    public $competenciasPrivilegiosEnabled = false;
    public $regiones = [];
    public $selectedRegionesCompetencias = null;
    public $selectedInstitucionesCompetencias = null;
    public $showRegionesSelect = false;
    public $showInstitucionesSelect = false;
    public $showTextAdminUsuarios = false;
    public $showTextAdminNacional = false;

    public $permisosTemporales = [
        'Postulador al S.N.I',
        'Autorizador de RATE'
    ];
    public $permisosTemporalesData = [];
    public $selectedpermisosTemporales = null;
    public $selectedRegionesCompetenciasTemporal = null;
    public $selectedInstitucionesCompetenciasTemporal = null;
    public $showRegionesTemporalSelect = false;
    public $showInstitucionesTemporalSelect = false;
    public $fechaInicio;
    public $fechaFin;


    public $title = 'Crear nuevo usuario';

    protected $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'rut' => 'required|string|max:12',
        'fecha_nacimiento' => 'required|date',
        'genero' => 'required|string',
        'correo' => 'required|email',
        'telefono' => 'nullable|string|max:15',
        'cargo' => 'required|string|max:255',
        'selectedRole' => 'required|string',
        'selectedEspecialRole' => 'nullable|string',
        'selectedInstituciones' => 'nullable|array',
        'selectedPermisosEspeciales' => 'nullable|array',
        'permisosTemporalesData' => 'nullable|array',
    ];

    protected $messages = [
        'nombres.required' => 'El nombre es obligatorio.',
        'apellidos.required' => 'El apellido es obligatorio.',
        'rut.required' => 'El RUT es obligatorio.',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
        'genero.required' => 'El género es obligatorio.',
        'correo.required' => 'El correo es obligatorio.',
        'cargo.required' => 'El cargo es obligatorio.',
        'selectedRole.required' => 'El rol es obligatorio.',
    ];


    //public function mount($isEdit, $user)
    public function mount()
    {
        //$this->isEdit = $isEdit;
        //$this->user = $user;

        if ($this->isEdit) {
            $this->title = 'Modificar usuario';

            $this->userId = $this->userEdit['id'];
            $this->nombres = $this->userEdit['nombres'];
            $this->apellidos = $this->userEdit['apellidos'];
            $this->rut = $this->userEdit['rut'];
            $this->fecha_nacimiento = $this->userEdit['fecha_nacimiento'];
            $this->genero = $this->userEdit['genero'];
            $this->correo = $this->userEdit['correo'];
            $this->telefono = $this->userEdit['telefono'];
            $this->cargo = $this->userEdit['cargo'];
            $this->selectedRole = $this->userEdit['role'];
            $this->selectedEspecialRole = $this->userEdit['especial_role'];
            $this->selectedInstituciones = $this->userEdit['instituciones'];
            $this->selectedSectores = $this->userEdit['sectores'];
            $this->selectedPermisosEspeciales = $this->userEdit['permisos_especiales'];
            $this->selectedCompetenciasPrivilegios = $this->userEdit['competencias_privilegios'];
            $this->selectedRegionesCompetencias = $this->userEdit['regiones_competencias'];
            $this->selectedInstitucionesCompetencias = $this->userEdit['instituciones_competencias'];
            $this->permisosTemporalesData = $this->userEdit['permisos_temporales'];

            $this->toggleEspecialRoles();
            $this->handleCompetenciasChange();



        }else{

            $this->nombres = $this->user['nombres'];
            $this->apellidos = $this->user['apellidos'];
            $this->rut = $this->user['rut'];
            $this->fecha_nacimiento = $this->user['fecha_nacimiento'];
            $this->genero = $this->user['genero'];

        }

        $this->getRegiones();
        $this->getInstituciones();
        $this->getSectores();

        $this->filteredInstituciones = $this->instituciones;
        $this->filteredSectores = $this->sectores;
    }

    public function getRegiones()
    {
        $this->regiones = [
            'Arica y Parinacota',
            'Tarapacá',
            'Antofagasta',
            'Atacama',
            'Coquimbo',
            'Valparaíso',
            'Metropolitana de Santiago',
            'O’Higgins',
            'Maule',
            'Ñuble',
            'Biobío',
            'La Araucanía',
            'Los Ríos',
            'Los Lagos',
            'Aysén del General Carlos Ibáñez del Campo',
            'Magallanes y de la Antártica Chilena'
        ];
    }

    public function getInstituciones()
    {
        $this->instituciones = [
            'Instituto A',
            'Instituto B',
            'Instituto C',
            'Instituto D',
            'Instituto E'
        ];
    }

    public function getSectores()
    {
        $this->sectores = [
            'Sector 1',
            'Sector 2',
            'Sector 3',
            'Sector 4',
            'Sector 5',
            'Sector 6',
            'Sector 7',
        ];
    }

    public function toggleEspecialRoles()
    {
        if ($this->selectedRole === 'Analista') {
            $this->especialRolesEnabled = true;
        } else {
            $this->especialRolesEnabled = false;
        }

        if ($this->selectedRole === 'Analista' && !$this->selectedEspecialRole) {
            $this->competenciasPrivilegiosEnabled = true;
            $this->sectoresEnabled = true;
        } else {
            $this->competenciasPrivilegiosEnabled = false;
            $this->sectoresEnabled = false;
        }

        if ($this->selectedRole === 'Analista' && $this->selectedEspecialRole === 'Administrador de Usuarios') {
            $this->showTextAdminUsuarios = true;
        } else {
            $this->showTextAdminUsuarios = false;
        }

        if ($this->selectedRole === 'Analista' && $this->selectedEspecialRole === 'Administrador Nacional') {
            $this->showTextAdminNacional = true;
        } else {
            $this->showTextAdminNacional = false;
        }
    }

    public function changeSearchInstituciones()
    {
        $this->filteredInstituciones = array_filter($this->instituciones, function ($institucion) {
            return str_contains(strtolower($institucion), strtolower($this->searchInstituciones));
        });
    }

    public function changeSearchSectores()
    {
        $this->filteredSectores = array_filter($this->sectores, function ($sector) {
            return str_contains(strtolower($sector), strtolower($this->searchSectores));
        });
    }

    public function action(){

    }

    public function removeInstitucion($institucion)
    {
        $this->selectedInstituciones = array_diff($this->selectedInstituciones, [$institucion]);
        $this->selectedInstituciones = array_values($this->selectedInstituciones);
    }

    public function removeSector($sector)
    {
        $this->selectedSectores = array_diff($this->selectedSectores, [$sector]);
        $this->selectedSectores = array_values($this->selectedSectores);
    }

    public function handleCompetenciasChange()
    {
        $this->showRegionesSelect = in_array('Postulador al S.N.I', $this->selectedCompetenciasPrivilegios);

        $this->showInstitucionesSelect = in_array('Autorizador de RATE', $this->selectedCompetenciasPrivilegios);
    }

    public function changeSelectedpermisosTemporales()
    {

        if ($this->selectedpermisosTemporales === 'Postulador al S.N.I') {
            $this->showRegionesTemporalSelect = true;
        } else {
            $this->showRegionesTemporalSelect = false;
        }

        if ($this->selectedpermisosTemporales === 'Autorizador de RATE') {
            $this->showInstitucionesTemporalSelect = true;
        }else {
            $this->showInstitucionesTemporalSelect = false;
        }
    }

    public function addPermisoTemporal()
    {

        $this->validate([
            'selectedpermisosTemporales' => 'required|string',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        $asignacion = '';
        if ($this->showRegionesTemporalSelect) {
            $this->validate(['selectedRegionesCompetenciasTemporal' => 'required|string']);
            $asignacion = $this->selectedRegionesCompetenciasTemporal;
        } elseif ($this->showInstitucionesTemporalSelect) {
            $this->validate(['selectedInstitucionesCompetenciasTemporal' => 'required|string']);
            $asignacion = $this->selectedInstitucionesCompetenciasTemporal;
        }

        $this->permisosTemporalesData[] = [
            'permiso' => $this->selectedpermisosTemporales,
            'asignacion' => $asignacion,
            'fecha_inicio' => $this->fechaInicio,
            'fecha_finalizacion' => $this->fechaFin,
        ];

        $this->showInstitucionesTemporalSelect = false;
        $this->showRegionesTemporalSelect = false;

        $this->reset(['selectedpermisosTemporales', 'fechaInicio', 'fechaFin', 'selectedRegionesCompetenciasTemporal', 'selectedInstitucionesCompetenciasTemporal']);
    }

    public function removePermiso($index)
    {
        unset($this->permisosTemporalesData[$index]);
        $this->permisosTemporalesData = array_values($this->permisosTemporalesData);
    }

    public function store()
    {
        $this->validate();

        $userData = [
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'rut' => $this->rut,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'genero' => $this->genero,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'cargo' => $this->cargo,
            'role' => $this->selectedRole,
            'especial_role' => $this->selectedEspecialRole,
            'instituciones' => $this->selectedInstituciones,
            'sectores' => $this->selectedSectores,
            'permisos_especiales' => $this->selectedPermisosEspeciales,
            'competencias_privilegios' => $this->selectedCompetenciasPrivilegios,
            'regiones_competencias' => $this->selectedRegionesCompetencias,
            'instituciones_competencias' => $this->selectedInstitucionesCompetencias,
            'permisos_temporales' => $this->permisosTemporalesData,
        ];

        $jsonData = json_encode($userData);

        session()->flash('toast', [
            'title' => 'success',
            'message' =>  'El usuario se ha creado exitosamente',
        ]);

        $this->resetForm();

        return redirect()->route('admin.usuarios');
    }

    public function update()
    {
        $this->validate();

        $userData = [
            'id' => $this->userId,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'rut' => $this->rut,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'genero' => $this->genero,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'cargo' => $this->cargo,
            'role' => $this->selectedRole,
            'especial_role' => $this->selectedEspecialRole,
            'instituciones' => $this->selectedInstituciones,
            'permisos_especiales' => $this->selectedPermisosEspeciales,
            'competencias_privilegios' => $this->selectedCompetenciasPrivilegios,
            'regiones_competencias' => $this->selectedRegionesCompetencias,
            'instituciones_competencias' => $this->selectedInstitucionesCompetencias,
            'permisos_temporales' => $this->permisosTemporalesData,
        ];

        $jsonData = json_encode($userData);

        session()->flash('toast', [
            'title' => 'success',
            'message' =>  'El usuario se ha actualizado exitosamente',
        ]);

        $this->resetForm();

        return redirect()->route('admin.usuarios');
    }

    public function resetForm()
    {
        $this->nombres = '';
        $this->apellidos = '';
        $this->rut = '';
        $this->fecha_nacimiento = '';
        $this->genero = '';
        $this->correo = '';
        $this->telefono = '';
        $this->cargo = '';
        $this->selectedRole = null;
        $this->selectedEspecialRole = null;
        $this->selectedInstituciones = [];
        $this->selectedSectores = [];
        $this->selectedPermisosEspeciales = [];
        $this->selectedCompetenciasPrivilegios = [];
        $this->selectedRegionesCompetencias = null;
        $this->selectedInstitucionesCompetencias = null;
        $this->permisosTemporalesData = [];
    }


    public function render()
    {
        return view('livewire.form-user')->layout('layouts.app');
    }
}
