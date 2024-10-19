<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateDocuments extends Command
{
    protected $signature = 'truncate:documents';
    protected $description = 'Vaciar la tabla documents';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        DB::table('documents')->delete();
        DB::table('sqlite_sequence')->where('name', 'documents')->delete();
        $this->info('Tabla documents vaciada exitosamente.');
    }
}
