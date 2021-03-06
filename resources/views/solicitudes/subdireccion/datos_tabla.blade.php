@extends('adminlte::page')

@section('title', 'dirección: Solicitudes')

@section('content_header')
    <h1>SOLICITUDES PENDIENTES</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">Firmar todas</a>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <br>
            <table class="table table-bordered table display table-sm" id="listado" style="width:100%">

                <thead class="table-info">
                    <tr>
                        <th>PLACA</th>
                        <th>CURP</th>
                        <th>FOLIO</th>
                        <th>INFORMACION</th>
                        <th>FECHA TRAMITE</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)

                        <tr>
                            <td>{{ $solicitud->placa }}</td>
                            <td>{{ $solicitud->curp }}</td>
                            <td>{{ $solicitud->folio }}</td>
                            <td>{{ $solicitud->informacion }}</td>
                            <td>{{ $solicitud->created_at->format('Y-m-d') }}</td>
                            <td><a href="{{ route('sub:resumen', $solicitud->id) }}"
                                    class="btn btn-outline-success btn-sm">Ver Solicitud
                                </a><br></td>
                            <td><a href="{{ route('sub:elimina', $solicitud->id) }}"
                                    class="btn btn-outline-danger btn-sm">Cancelar Solicitud
                                    </button></td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <form method='POST' action='{{ route('sub:califica') }}' enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title  text-center">CONFIRMACIÓN</h4>
                        </div>
                        <div class="alert bg-warning">
                            <strong>Atencion!</strong> ¿estas seguro que deseas firmar todas las solicitudes?
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <label>PASSWORD:</label>
                                    <div class="input-group-prepend">
                                        <input type="password" name='contraseña' class="form-control" value="">
                                    </div><br><br>
                                </div>
                                <div class="col-md-12">
                                    <label>SUBIR ARCHIVO:</label>
                                    <div class="input-group-prepend">
                                        <input type="file" name='archivo' class="form-control-file" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a class="btn btn-danger text-white" data-dismiss="modal">Cancelar</a>
                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listado').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });

    </script>
@stop
