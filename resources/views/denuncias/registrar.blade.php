@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Registrar Evaluación</h1>
    <form action="" method="POST">
        @csrf

        <div class="row">
            <!-- Primer Columna (Formulario Izquierda) -->
            <div class="col-md-6">
                <!-- Item -->
                <div class="mb-3">
                    <label for="item" class="form-label">Item</label>
                    <input type="text" name="item" id="item" class="form-control" value="{{ old('item') }}">
                    @error('item')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Canal -->
                <div class="mb-3">
                    <label for="canal" class="form-label">Canal</label>
                    <input type="text" name="canal" id="canal" class="form-control" value="{{ old('canal') }}">
                    @error('canal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Fecha de Recepción -->
                <div class="mb-3">
                    <label for="fecha_recepcion" class="form-label">Fecha de Recepción</label>
                    <input type="date" name="fecha_recepcion" id="fecha_recepcion" class="form-control" value="{{ old('fecha_recepcion') }}">
                    @error('fecha_recepcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Año de Ingreso -->
                <div class="mb-3">
                    <label for="anio_ingreso" class="form-label">Año de Ingreso</label>
                    <input type="number" name="anio_ingreso" id="anio_ingreso" class="form-control" value="{{ old('anio_ingreso') }}">
                    @error('anio_ingreso')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Entidad Sujeta a Control -->
                <div class="mb-3">
                    <label for="entidad_sujeta_control" class="form-label">Entidad Sujeta a Control</label>
                    <input type="text" name="entidad_sujeta_control" id="entidad_sujeta_control" class="form-control" value="{{ old('entidad_sujeta_control') }}">
                    @error('entidad_sujeta_control')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Ámbito Geográfico -->
                <div class="mb-3">
                    <label for="ambito_geografico" class="form-label">Ámbito Geográfico</label>
                    <input type="text" name="ambito_geografico" id="ambito_geografico" class="form-control" value="{{ old('ambito_geografico') }}">
                    @error('ambito_geografico')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Segunda Columna (Formulario Derecha) -->
            <div class="col-md-6">
                <!-- Provincia -->
                <div class="mb-3">
                    <label for="provincia" class="form-label">Provincia</label>
                    <input type="text" name="provincia" id="provincia" class="form-control" value="{{ old('provincia') }}">
                    @error('provincia')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Distrito -->
                <div class="mb-3">
                    <label for="distrito" class="form-label">Distrito</label>
                    <input type="text" name="distrito" id="distrito" class="form-control" value="{{ old('distrito') }}">
                    @error('distrito')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Otros Campos -->
                @foreach (['fecha_registro', 'recepcion', 'auditor_recepcion', 'fecha_evaluacion', 'resultado_recepcion'] as $field)
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    <input type="{{ in_array($field, ['fecha_registro', 'fecha_evaluacion']) ? 'date' : 'text' }}" 
                           name="{{ $field }}" 
                           id="{{ $field }}" 
                           class="form-control" 
                           value="{{ old($field) }}">
                    @error($field)
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @endforeach

                <!-- Botón de Enviar -->
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>
</div>
@endsection
