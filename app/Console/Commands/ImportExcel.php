<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\DenunciasImport;

class ImportExcel extends Command
{
    protected $signature = 'import:excel {file}';
    protected $description = 'Importar datos desde un archivo Excel';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = public_path($this->argument('file')); // Convierte la ruta relativa a absoluta.

        if (!file_exists($file)) {
            $this->error("El archivo especificado no existe: $file");
            return 1;
        }

        try {
            $importer = new DenunciasImport();
            $importer->import($file);

            $this->info('Los datos se han importado exitosamente.');
        } catch (\Exception $e) {
            $this->error('Error durante la importación: ' . $e->getMessage());
        }

        return 0;
    }
}
