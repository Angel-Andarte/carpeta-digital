<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Document;



class UploadFileComponent extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $upload;
    public $isLoading = false;
    public $documents = [];


    protected $listeners = ['closeModal' => 'closeModal','cargarArchivos','mostrarToastSuccess','mostrarToastError'];

    public function mount()
    {
        $this->cargarArchivos();
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function cargarArchivos()
    {
        $this->documents = Document::all();
    }

    public function mostrarToastSuccess($mensaje)
    {
        session()->flash('toast', [
            'title' => 'success',
            'message' => $mensaje,
        ]);

    }

    public function mostrarToastError($mensaje)
    {
        session()->flash('toast', [
            'title' => 'error',
            'message' => $mensaje,
        ]);

    }


    public function render()
    {
        return view('livewire.upload-file-component');
    }
}
