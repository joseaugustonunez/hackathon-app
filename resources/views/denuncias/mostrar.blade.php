    @extends('layouts.app')

    @section('content')
        <div class="container-fluid mt-4 px-4">
            <h1 class="mb-4 text-center text-white bg-danger p-3 rounded">Lista de Denuncias</h1>

            <!-- Formulario de filtros -->
                <form action="{{ route('denuncias') }}" method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="auditor_recepcion" class="form-control" placeholder="Auditor de recepción" value="{{ request()->auditor_recepcion }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="resultado_recepcion" class="form-control" placeholder="Resultado recepción" value="{{ request()->resultado_recepcion }}">
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="fecha_registro" class="form-control" value="{{ request()->fecha_registro }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="canal" class="form-control" placeholder="Canal" value="{{ request()->canal }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="provincia" class="form-control" placeholder="Provincia" value="{{ request()->provincia }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="ambito_geografico" class="form-control" placeholder="Ámbito geográfico" value="{{ request()->ambito_geografico }}">
                        </div>

                        <!-- Segunda fila con margen superior -->
                        <div class="col-md-2 mt-3">
                            <input type="text" name="entidad_sujeta_control" class="form-control" placeholder="Entidad sujeta a control" value="{{ request()->entidad_sujeta_control }}">
                        </div>
                        <div class="col-md-2 mt-3">
                            <input type="text" name="anio_ingreso" class="form-control" placeholder="Año de ingreso" value="{{ request()->anio_ingreso }}">
                        </div>
                        <div class="col-md-2 mt-3">
                            <button type="submit" class="btn btn-danger w-100">Filtrar</button>
                        </div>
                    </div>
                </form>

            <!-- Tabla de Denuncias -->
            <div class="table-responsive" style="height: calc(100vh - 180px);">
                <table class="table table-hover table-striped table-sm mx-auto border-0">
                    <thead class="table-danger text-white">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Canal</th>
                            <th scope="col">Fecha de recepción</th>
                            <th scope="col">Año de ingreso</th>
                            <th scope="col">Entidad sujeta de control</th>
                            <th scope="col">Ámbito geográfico</th>
                            <th scope="col">Provincia</th>
                            <th scope="col">Distrito</th>
                            <th scope="col">Fecha de registro</th>
                            <th scope="col">Recepción</th>
                            <th scope="col">Auditor Recepción</th>
                            <th scope="col">Fecha evaluación</th>
                            <th scope="col">Resultado recepción</th>
                            <th scope="col">Auditor evaluación</th>
                            <th scope="col">Fecha culminación</th>
                            <th scope="col">Estado</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($denuncias as $denuncia)
                            <tr class="table-light">
                                <th scope="row">{{ $denuncia->item }}</th>
                                <td>{{ $denuncia->canal }}</td>
                                <td>{{ $denuncia->fecha_recepcion }}</td>
                                <td>{{ $denuncia->anio_ingreso }}</td>
                                <td>{{ $denuncia->entidad_sujeta_control }}</td>
                                <td>{{ $denuncia->ambito_geografico }}</td>
                                <td>{{ $denuncia->provincia }}</td>
                                <td>{{ $denuncia->distrito }}</td>
                                <td>{{ $denuncia->fecha_registro }}</td>
                                <td>{{ $denuncia->recepcion }}</td>
                                <td>{{ $denuncia->auditor_recepcion }}</td>
                                <td>{{ $denuncia->fecha_evaluacion }}</td>
                                <td>{{ $denuncia->resultado_recepcion }}</td>
                                <td>{{ $denuncia->auditor_evaluacion }}</td>
                                <td>{{ $denuncia->fecha_culminacion }}</td>

                                <td style="min-width: 150px;">
                                    <form  action="{{ route('denuncias.update_estado', $denuncia->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="estado" class="form-control form-control-sm text-center 
                                        @if($denuncia->estado == 'Aprobado') bg-success text-white
                                        @elseif($denuncia->estado == 'Rechazado') bg-danger text-white
                                        @elseif($denuncia->estado == 'Pendiente') bg-secondary text-white
                                        @elseif($denuncia->estado == 'Proceso') bg-warning text-white @endif" 
                                        onchange="this.form.submit()">
                                            <option  value="Pendiente" {{ $denuncia->estado == 'Pendiente' ? 'selected' : '' }}>En proceso</option>
                                            <option value="Aprobado" {{ $denuncia->estado == 'Aprobado' ? 'selected' : '' }}>Admitido</option>
                                            <option value="Rechazado" {{ $denuncia->estado == 'Rechazado' ? 'selected' : '' }}>No admitido</option>
                                            <option value="Proceso" {{ $denuncia->estado == 'Proceso' ? 'selected' : '' }}>Derivado de OCI</option>
                                        </select>
                                    </form>
                                </td>

                                <td>
                                    <!-- Aquí puedes agregar otras acciones como Editar, Eliminar, etc. -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginación con Bootstrap -->
                <div class="d-flex justify-content-center">
                    {{ $denuncias->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    @endsection
