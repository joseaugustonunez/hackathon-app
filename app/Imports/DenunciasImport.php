<?php
namespace App\Imports;

use App\Models\Denuncias;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class DenunciasImport
{
    public function import($filePath)
    {
        // Carga el archivo Excel usando PhpSpreadsheet
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Número de columnas esperadas
        $expectedColumns = 16;

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                // Ignora la primera fila (encabezados)
                continue;
            }

            // Completa las columnas faltantes con null
            $row = array_pad($row, $expectedColumns, null);

            // Procesa cada fila
            Denuncias::create([
                'item' => $row[0] ?? null,
                'canal' => $row[1] ?? null,
                'fecha_recepcion' => $this->transformDate($row[2] ?? null),
                'anio_ingreso' => $row[3] ?? null,
                'entidad_sujeta_control' => $row[4] ?? null,
                'ambito_geografico' => $row[5] ?? null,
                'provincia' => $row[6] ?? null,
                'distrito' => $row[7] ?? null,
                'fecha_registro' => $this->transformDate($row[8] ?? null),
                'recepcion' => $row[9] ?? null,
                'auditor_recepcion' => $row[10] ?? null,
                'fecha_evaluacion' => $this->transformDate($row[11] ?? null),
                'resultado_recepcion' => $row[12] ?? null,
                'auditor_evaluacion' => $row[13] ?? null,
                'fecha_culminacion' => $this->transformDate($row[14] ?? null),
                'resultado_evaluacion' => $row[15] ?? null,
            ]);
        }
    }

    private function transformDate($excelDate)
    {
        if (!$excelDate) {
            return null; // Si la celda está vacía, devuelve null
        }

        try {
            // Maneja diferentes formatos de fecha
            if (is_numeric($excelDate)) {
                // Formato de fecha de Excel
                return Date::excelToDateTimeObject($excelDate)->format('Y-m-d');
            } else {
                // Formato de texto (ejemplo: 30/12/2022 o 10-02-23)
                return Carbon::parse($excelDate)->format('Y-m-d');
            }
        } catch (\Exception $e) {
            return null; // Si la fecha no es válida, devuelve null
        }
    }
}
