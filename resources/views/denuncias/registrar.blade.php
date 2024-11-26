@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center text-danger">Registrar Denuncia</h1>
    <form action="{{ route('denuncias.store') }}" method="POST" class="shadow-lg p-4 rounded bg-white">
        @csrf

        <div class="row g-4">
            <!-- Primer Columna (Formulario Izquierda) -->
            <div class="col-md-6">
                <!-- Item -->
                <div class="form-floating">
                    <input type="text" name="item" id="item" class="form-control" placeholder="Item" value="{{ old('item') }}">
                    <label for="item">Item</label>
                    @error('item')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Canal -->
                <div class="form-floating mt-3">
                    <input type="text" name="canal" id="canal" class="form-control" placeholder="Canal" value="{{ old('canal') }}" required>
                    <label for="canal">Canal</label>
                    @error('canal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Fecha de Recepción -->
                <div class="form-floating mt-3">
                    <input type="date" name="fecha_recepcion" id="fecha_recepcion" class="form-control" placeholder="Fecha de Recepción" value="{{ old('fecha_recepcion') }}" required>
                    <label for="fecha_recepcion">Fecha de Recepción</label>
                    @error('fecha_recepcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Año de Ingreso -->
                <div class="form-floating mt-3">
                    <input type="number" name="anio_ingreso" id="anio_ingreso" class="form-control" placeholder="Año de Ingreso" value="{{ old('anio_ingreso') }}" required>
                    <label for="anio_ingreso">Año de Ingreso</label>
                    @error('anio_ingreso')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Entidad Sujeta a Control -->
                <div class="form-floating mt-3">
                    <input type="text" name="entidad_sujeta_control" id="entidad_sujeta_control" class="form-control" placeholder="Entidad Sujeta a Control" value="{{ old('entidad_sujeta_control') }}">
                    <label for="entidad_sujeta_control">Entidad Sujeta a Control</label>
                    @error('entidad_sujeta_control')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Ámbito Geográfico -->
                <div class="form-floating mt-3">
                    <input type="text" name="ambito_geografico" id="ambito_geografico" class="form-control" placeholder="Ámbito Geográfico" value="{{ old('ambito_geografico') }}">
                    <label for="ambito_geografico">Ámbito Geográfico</label>
                    @error('ambito_geografico')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Segunda Columna (Formulario Derecha) -->
            <div class="col-md-6">
                <!-- Provincia -->
                <div class="form-floating">
                    <input type="text" name="provincia" id="provincia" class="form-control" placeholder="Provincia" value="{{ old('provincia') }}">
                    <label for="provincia">Provincia</label>
                    @error('provincia')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Distrito -->
                <div class="form-floating mt-3">
                    <input type="text" name="distrito" id="distrito" class="form-control" placeholder="Distrito" value="{{ old('distrito') }}">
                    <label for="distrito">Distrito</label>
                    @error('distrito')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Otros Campos -->
                @foreach (['fecha_registro', 'recepcion', 'auditor_recepcion', 'fecha_evaluacion', 'resultado_recepcion'] as $field)
                <div class="form-floating mt-3">
                    <input type="{{ in_array($field, ['fecha_registro', 'fecha_evaluacion']) ? 'date' : 'text' }}" 
                           name="{{ $field }}" 
                           id="{{ $field }}" 
                           class="form-control" 
                           placeholder="{{ ucfirst(str_replace('_', ' ', $field)) }}" 
                           value="{{ old($field) }}">
                    <label for="{{ $field }}">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    @error($field)
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @endforeach
            </div>
        </div>

        <!-- Botón de Enviar -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-danger px-5 py-2">Registrar</button>
        </div>
    </form>
</div>
@endsection
