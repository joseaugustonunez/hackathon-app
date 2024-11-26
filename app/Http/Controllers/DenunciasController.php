<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncias;

class DenunciasController extends Controller
{
    /**
     * Muestra una lista de denuncias con filtros.
     */
    public function index(Request $request)
    {
        $query = Denuncias::query();

        // Filtrar por auditor de recepción
        if ($request->has('auditor_recepcion') && $request->auditor_recepcion != '') {
            $query->where('auditor_recepcion', $request->auditor_recepcion);
        }

        // Filtrar por resultado de recepción
        if ($request->has('resultado_recepcion') && $request->resultado_recepcion != '') {
            $query->where('resultado_recepcion', $request->resultado_recepcion);
        }

        // Filtrar por fecha de registro
        if ($request->has('fecha_registro') && $request->fecha_registro != '') {
            $query->whereDate('fecha_registro', $request->fecha_registro);
        }

        // Filtrar por canal
        if ($request->has('canal') && $request->canal != '') {
            $query->where('canal', $request->canal);
        }

        // Filtrar por provincia
        if ($request->has('provincia') && $request->provincia != '') {
            $query->where('provincia', $request->provincia);
        }

        // Filtrar por ámbito geográfico
        if ($request->has('ambito_geografico') && $request->ambito_geografico != '') {
            $query->where('ambito_geografico', $request->ambito_geografico);
        }

        // Filtrar por entidad sujeta a control
        if ($request->has('entidad_sujeta_control') && $request->entidad_sujeta_control != '') {
            $query->where('entidad_sujeta_control', $request->entidad_sujeta_control);
        }

        // Filtrar por año de ingreso
        if ($request->has('anio_ingreso') && $request->anio_ingreso != '') {
            $query->where('anio_ingreso', $request->anio_ingreso);
        }

        // Filtrar por auditor de evaluación
        if ($request->has('auditor_evaluacion') && $request->auditor_evaluacion != '') {
            $query->where('auditor_evaluacion', $request->auditor_evaluacion);
        }

        // Filtrar por resultado de evaluación
        if ($request->has('resultado_evaluacion') && $request->resultado_evaluacion != '') {
            $query->where('resultado_evaluacion', $request->resultado_evaluacion);
        }

        // Filtrar por fecha de culminación
        if ($request->has('fecha_culminacion') && $request->fecha_culminacion != '') {
            $query->whereDate('fecha_culminacion', $request->fecha_culminacion);
        }

        // Ordenar por ID en orden descendente para mostrar el último al primero
        $denuncias = $query->orderBy('id', 'desc')->paginate(15);

        return view('denuncias.mostrar', compact('denuncias'));
    }

    /**
     * Muestra la vista para cargar casos desde un archivo Excel.
     */
    public function mostrarcasos()
    {
        return view('denuncias.cargarcasos');
    }

    /**
     * Maneja la subida de un archivo Excel y muestra un mensaje de éxito.
     */
    public function cargarCasosDesdeVista(Request $request)
    {
        // Validar que se subió un archivo Excel
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        // Redirigir con una alerta de éxito sin procesar nada
        return redirect('/denuncias/mostrar')->with('success', 'Archivo cargado con éxito.');
    }

    /**
     * Muestra la vista para registrar nuevas denuncias.
     */
    public function registrardenuncias()
    {
        return view('denuncias.registrar');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item' => 'nullable|string|max:255',
            'canal' => 'required|string|max:255',
            'fecha_recepcion' => 'required|date',
            'anio_ingreso' => 'required|integer',
            'entidad_sujeta_control' => 'nullable|string|max:255',
            'ambito_geografico' => 'nullable|string|max:255',
            'provincia' => 'nullable|string|max:255',
            'distrito' => 'nullable|string|max:255',
            'fecha_registro' => 'nullable|date',
            'recepcion' => 'nullable|string|max:255',
            'auditor_recepcion' => 'nullable|string|max:255',
            'fecha_evaluacion' => 'nullable|date',
            'resultado_recepcion' => 'nullable|string|max:255',
        ]);

        Denuncias::create($validatedData);

        return redirect()->route('denuncias')->with('success', 'Denuncia registrada con éxito.');
    }

    public function updateEstado(Request $request, Denuncias $denuncia)
    {
        // Validar el estado
        $validated = $request->validate([
            'estado' => 'required|in:Pendiente,Aprobado,Rechazado,Proceso',
        ]);

        // Actualizar el estado
        $denuncia->estado = $validated['estado'];

        // Si el estado es Aprobado, Rechazado o Proceso, actualizar la fecha de culminación
        if (in_array($denuncia->estado, ['Aprobado', 'Rechazado', 'Proceso'])) {
            $denuncia->fecha_culminacion = now(); // Establecer la fecha actual
        }

        // Guardar los cambios
        $denuncia->save();

        // Redirigir con un mensaje de éxito
        return back()->with('success', 'Estado actualizado correctamente.');
    }
}
