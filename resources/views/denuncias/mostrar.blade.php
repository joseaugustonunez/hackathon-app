@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <h1 class="mb-4 text-center text-white bg-danger p-3 rounded">Lista de Usuarios</h1>
        <div class="table-responsive" style="height: calc(100vh - 180px);">
            <table class="table table-hover table-striped table-sm mx-auto border-0">
                <thead class="bg-danger text-white">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Canal</th>
                        <th scope="col">Fecha de recepcion</th>
                        <th scope="col">Año ingreso</th>
                        <th scope="col">Entidad sujeta de control</th>
                        <th scope="col">Ambito geografico</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Distrito</th>
                        <th scope="col">Fecha de resgistro</th>
                        <th scope="col">Recepcion</th>
                        <th scope="col">Auditor Recepcion</th>
                        <th scope="col">Fecha evaluacion</th>
                        <th scope="col">Resultado recepcion</th>
                        <th scope="col">Auditor recepcion</th>
                        <th scope="col">Auditor evlauacion</th>
                        <th scope="col">Fecha culminacion</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr class="table-light">
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr class="table-light">
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>Bird</td>
                        <td>@twitter</td>
                        <td>3</td>
                        <td>Larry</td>
                        <td>Bird</td>
                        <td>@twitter</td>
                        <td>3</td>
                        <td>Larry</td>
                        <td>Bird</td>
                        <td>@twitter</td>
                        <td>3</td>
                        <td>Larry</td>
                        <td>Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <!-- Más filas -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
