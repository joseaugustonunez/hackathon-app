<?php
namespace App\Imports;

use App\Models\Denuncias;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

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

        // Itera sobre las filas del archivo
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                // Salta la primera fila si es un encabezado
                continue;
            }

            // Valida que la fila tenga al menos 16 columnas
            if (count($row) < $expectedColumns) {
                continue; // Ignora filas incompletas
            }

            // Inserta cada fila en la base de datos
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
            return null; // Retorna null si la fecha está vacía
        }

        // Verifica si el dato es un número (formato válido para excelToDateTimeObject)
        if (is_numeric($excelDate)) {
            return Date::excelToDateTimeObject($excelDate)->format('Y-m-d');
        }

        // Si no es un número, intenta convertirlo como texto de fecha
        try {
            return \Carbon\Carbon::parse($excelDate)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; // Retorna null si no es una fecha válida
        }
    }
}
