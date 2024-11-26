@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <h1 class="mb-4 text-center text-white bg-danger p-3 rounded">Cargar Casos desde un Archivo Excel</h1>

        <!-- Formulario para cargar el archivo Excel -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-file-excel"></i> Subir Archivo Excel
                    </div>
                    <div class="card-body">
                        <!-- Mensaje de éxito o error -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('denuncias.cargarCasosDesdeVista') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Seleccionar archivo Excel</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-danger mt-3">Cargar Casos</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Incluir los iconos de Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endpush
