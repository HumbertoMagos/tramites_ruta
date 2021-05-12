@extends('adminlte::page')

@section('title', 'TRAMITES RUTA')

@section('content_header')
    <h1>RESUMEN DE SOLICITUD</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="alert alert-default-primary alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Atencion!</strong> Verifica que los datos sean correctos
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <label>PLACA:</label>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" value="{{ $solicitud->placa }}" readonly>
                    </div><br><br>
                    <label>FOLIO:</label>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" value="{{ $solicitud->folio }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>CURP:</label>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" value="{{ $solicitud->curp }}" readonly>
                    </div><br><br>
                    <label>INFORMACION:</label>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" value="{{ $solicitud->informacion }}" readonly>
                    </div>
                </div>
            </div><br><br><br>
            <button type="button" class="btn btn-outline-success btn-block" data-toggle="modal"
                data-target="#myModal">Firmar <i class="far fa-check-circle"></i></button>

            <a href="{{ route('direccion:datos') }}" class="btn btn-outline-danger btn-block">Rechazar <i
                    class="far fa-times-circle"></i></a>
        </div>

        | <form method="POST" action="{{ route('direccion:califica') }}" enctype="multipart/form-data">
            @csrf
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title  text-center">CONFIRMACION</h4>
                        </div>
                        <div class="alert alert-warning">
                            <strong>Atencion!</strong> estas seguro que deseas firmar esta solicitud?
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <label>PLACA:</label>
                                    <div class="input-group">
                                        <input type="text" name='placa' class="form-control" value="" >
                                    </div><br><br>

                                </div>
                                <div class="col-md-12">
                                    <label>PASSWORD:</label>
                                    <div class="input-group-prepend">
                                        <input type="password" name="contraseña" class="form-control" value="" >
                                    </div><br><br>
                                </div>
                                <div class="col-md-12">
                                    <label>SUBIR ARCHIVO:</label>
                                    <div class="input-group-prepend">
                                        <input type="file" name='archivo' class="form-control-file" value="" >
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
    </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
