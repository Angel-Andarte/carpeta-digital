<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CustomDropzone extends Component
{
    use WithFileUploads;

    #[Modelable]
    public ?array $files;

    #[Locked]
    public array $rules;

    #[Locked]
    public string $uuid;

    public $upload;

    public string $error;

    public bool $multiple;

    public $carpeta;

    public $showModal = false;
    public $formVisible = false;
    public $uploadSectionVisible = true;
    public $errorSizeContent = false;
    public $errorFormatContent = false;
    public $errorDuplicateContent = false;
    public $errorConectionFail = false;
    public $alertError = false;
    public $errorMessage = null;

    public $year;
    public $textArea;
    public $years = [2021, 2022, 2023, 2024];

    public $confirmingDelete = false;
    public $fileToDelete;

    public $fileName;


    public function rules(): array
    {
        $field = $this->multiple ? 'upload.*' : 'upload';

        return [
            $field => [...$this->rules],
        ];
    }

    public function mount(array $rules = [], bool $multiple = false): void
    {
        $this->uuid = Str::uuid();
        $this->multiple = $multiple;
        $this->rules = $rules;
        $this->files = [];
        $this->carpeta = "Anexos";
    }

    public function updatedUpload(): void
    {
        $this->reset('error', 'errorSizeContent', 'errorFormatContent', 'errorDuplicateContent');

        $this->fileName = $this->upload->getClientOriginalName();

        $existingDocument = Document::where('name', $this->fileName)->first();

        if ($existingDocument) {
            $this->uploadSectionVisible = false;
            $this->errorDuplicateContent = true;
            $this->formVisible = false;
        }

        try {
            $this->validate();
        } catch (ValidationException $e) {

            $errors = $e->errors();

            foreach ($errors as $error) {
                if (str_contains($error[0], 'must not be greater')) {
                    $this->errorSizeContent = true;
                } elseif (str_contains($error[0], 'must be a file of type')) {
                    $this->errorFormatContent = true;
                }
            }

            // If the upload validation fails, we trigger the following event
            $this->dispatch("{$this->uuid}:uploadError", $e->getMessage());

            return;
        }

        $this->upload = $this->multiple
            ? $this->upload
            : [$this->upload];

        foreach ($this->upload as $upload) {
            $this->handleUpload($upload);
        }


        $this->reset('upload');
    }

    /**
     * Handle the uploaded file and dispatch an event with file details.
     */
    public function handleUpload(TemporaryUploadedFile $file): void
    {
        $this->dispatch("{$this->uuid}:fileAdded", [
            'tmpFilename' => $file->getFilename(),
            'name' => $file->getClientOriginalName(),
            'extension' => $file->extension(),
            'path' => $file->path(),
            'temporaryUrl' => $file->isPreviewable() ? $file->temporaryUrl() : null,
            'size' => $file->getSize(),
        ]);
    }

    /**
     * Handle the file added event.
     */
    #[On('{uuid}:fileAdded')]
    public function onFileAdded(array $file): void
    {
        $this->files = $this->multiple ? array_merge($this->files, [$file]) : [$file];

    }

    /**
     * Handle the file removal event.
     */
    #[On('{uuid}:fileRemoved')]
    public function onFileRemoved(string $tmpFilename): void
    {

        $this->files = array_filter($this->files, function ($file) use ($tmpFilename) {
            // Remove the temporary file from the array only.
            // No need to remove from the Livewire's temporary upload directory manually.
            // Because, files older than 24 hours cleanup automatically by Livewire.
            // For more details, refer to: https://livewire.laravel.com/docs/uploads#configuring-automatic-file-cleanup
            return $file['tmpFilename'] !== $tmpFilename;
        });

    }

    public function removeFileUpload()
    {
        $this->confirmingDelete = false;

        $this->reset(['upload', 'year', 'textArea']);
        $this->dispatch('closeModal');
        $this->dispatch('closeModal');

        $this->dispatch('mostrarToastSuccess', 'Subida cancelada');
       // \Jeybin\Toastr\Toastr::success('Subida cancelada')->toast();
    }

    public function confirmDelete($fileName)
    {
        $this->fileToDelete = $fileName;
        $this->confirmingDelete = true;
    }

    /**
     * Handle the upload error event.
     */
    #[On('{uuid}:uploadError')]
    public function onUploadError(string $error): void
    {
        $this->uploadSectionVisible = false;
        $this->formVisible = false;
        $this->error = $error;

    }

    /**
     * Retrieve the MIME types from the rules.
     */
    #[Computed]
    public function mimes(): string
    {
        return collect($this->rules)
            ->filter(fn ($rule) => str_starts_with($rule, 'mimes:'))
            ->flatMap(fn ($rule) => explode(',', substr($rule, strpos($rule, ':') + 1)))
            ->unique()
            ->values()
            ->join(', ');
    }

    /**
     * Get the accepted file extensions based on MIME types.
     */
    #[Computed]
    public function accept(): ?string
    {
        return ! empty($this->mimes) ? collect(explode(', ', $this->mimes))->map(fn ($mime) => '.'.$mime)->implode(',') : null;
    }

    /**
     * Get the maximum file size in a human-readable format.
     */
    #[Computed]
    public function maxFileSize(): ?string
    {
        return collect($this->rules)
            ->filter(fn ($rule) => str_starts_with($rule, 'max:'))
            ->flatMap(fn ($rule) => explode(',', substr($rule, strpos($rule, ':') + 1)))
            ->unique()
            ->values()
            ->first();
    }

    /**
     * Checks if the provided MIME type corresponds to an image.
     */
    public function isImageMime($mime): bool
    {
        return in_array($mime, ['png', 'gif', 'bmp', 'svg', 'jpeg', 'jpg']);
    }

    public function retryUpload()
    {

        if ($this->errorSizeContent) {
            $this->alertError = true;
            $this->errorMessage = 'Por favor, <strong>reduce el tamaño de tu archivo</strong> y vuelve a subirlo.';
        } elseif ($this->errorFormatContent) {
            $this->alertError = true;
            $this->errorMessage = 'Por favor, sube un archivo con un formato permitido para esta carpeta.';
        } elseif ($this->errorDuplicateContent) {
            $this->alertError = true;
            $this->errorMessage = 'Por favor, <strong>cambia el nombre del archivo por uno diferente al de los documentos ya subidos</strong>. Asegurate de que sea claro y distintivo respecto al contenido';
        }

        $this->errorSizeContent = false;
        $this->errorFormatContent = false;
        $this->errorDuplicateContent = false;
        $this->errorConectionFail  = false;
        $this->formVisible = false;
        $this->uploadSectionVisible = true;

        $this->reset('files','upload');
    }

    public function handleNetworkError()
    {
        $this->uploadSectionVisible = false;
        $this->errorSizeContent = false;
        $this->errorFormatContent = false;
        $this->errorDuplicateContent = false;
        $this->formVisible = false;
        $this->errorConectionFail = true;

        $this->reset('files','upload');
    }

    public function initUpload(){
        $this->formVisible = true;
        $this->uploadSectionVisible = false;
    }

    public function submitForm()
    {
        $this->validate([
            'files' => 'required|array',
            'year' => 'required',
            'textArea' => 'nullable|string',
        ]);

        if (empty($this->files)) {
            \Jeybin\Toastr\Toastr::error( 'No se ha subido ningún archivo.')->toast();
            return;
        }

        foreach ($this->files as $file) {

            $fullTmpPath = storage_path('app/livewire-tmp/' . $file['tmpFilename']);

            if (!file_exists($fullTmpPath)) {
                $text = "El archivo {$file['name']} no existe en la ruta: $fullTmpPath";
                \Jeybin\Toastr\Toastr::error($text)->toast();
            }

            $storedFilePath = Storage::putFileAs(
                'public/uploads',
                new \Illuminate\Http\File($fullTmpPath),
                $file['name']
            );

            if ($storedFilePath) {
                Document::create([
                    'name' => $file['name'],
                    'size' => $file['size'],
                    'format' => $file['extension'],
                    'year' => $this->year,
                    'description' => $this->textArea,
                    'version' => '1.0',
                    'modified_by' => auth()->id(),
                ]);

                $this->dispatch('closeModal');
                $this->reset(['upload', 'year', 'textArea']);
                \Jeybin\Toastr\Toastr::success('Documento subido con exito')->toast();
                $this->dispatch('cargarArchivos');

            } else {
                $text = "No se pudo guardar el archivo {$file['name']}.";
                \Jeybin\Toastr\Toastr::error($text)->toast();
            }
        }

    }




    public function render(): View
    {
        return view('livewire.custom-dropzone', [
            'formatos' => $this->accept(),
            'tamanoMax' => $this->maxFileSize()
        ]);
    }

}
