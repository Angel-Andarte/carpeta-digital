<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use PhpOffice\PhpSpreadsheet\IOFactory as ExcelIOFactory;
use Dompdf\Dompdf;

class PreviewDocument extends Component
{
    public $registroId;
    public $previewUrl;
    public $file;
    public $filePDF;
    public $fileOther = [
        'route' => 'public/uploads/CRUD.docx',
        'format' => 'docx',
        'name' => 'docx',
    ];

    public $fileOtherXls = [
        'route' => 'public/uploads/balance.xlsx',
        'format' => 'xlsx',
        'name' => 'balance.xlsx',
    ];

    public function mount()
    {

    }

    public function generatePreviewUrl()
    {
        $file = $this->fileOtherXls;

        if (in_array($file['format'], ['png', 'jpg', 'jpeg', 'pdf'])) {
            $this->previewUrl = Storage::url($file['route']);
        } else {
            $this->previewUrl = $this->convertToPdf($file);
        }
    }

    private function convertToPdf($file)
    {
        $path = Storage::path($file['route']);
        $outputPath = 'public/uploads/temp_preview.pdf';

        if (in_array($file['format'], ['doc', 'docx'])) {

            $phpWord = WordIOFactory::load($path);
            $htmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');

            ob_start();
            $htmlWriter->save('php://output');
            $htmlContent = ob_get_clean();

            $dompdf = new Dompdf();
            $dompdf->loadHtml($htmlContent);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            file_put_contents(Storage::path($outputPath), $dompdf->output());

        } elseif (in_array($file['format'], ['xls', 'xlsx'])) {

            $spreadsheet = ExcelIOFactory::load($path);
            $pdfWriter = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf($spreadsheet);
            $pdfWriter->save(Storage::path($outputPath));
        }

        return Storage::url($outputPath);
    }

    public function render()
    {
        return view('livewire.preview-document');
    }
}
