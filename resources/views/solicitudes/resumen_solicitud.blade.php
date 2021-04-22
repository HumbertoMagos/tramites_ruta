@extends('adminlte::page')

@section('title', 'TRAMITES RUTA')

@section('content_header')
    <h1>RESUMEN DE SOLICITUD</h1>
@stop

@section('content')
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
                    <input type="text" class="form-control" value="{{$solicitud->placa}}" readonly>
                </div><br><br>
                <label>FOLIO:</label>
                <div class="input-group-prepend">
                    <input type="text" class="form-control" value="{{$solicitud->folio}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <label>CURP:</label>
                <div class="input-group-prepend">
                    <input type="text" class="form-control" value="{{$solicitud->curp}}" readonly>
                </div><br><br>
                <label>INFORMACION:</label>
                <div class="input-group-prepend">
                    <input type="text" class="form-control" value="{{$solicitud->informacion}}" readonly>
                </div>
            </div>
        </div><br><br><br>
        <button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#myModal">Aceptar <i class="far fa-check-circle"></i></button>

        <a href="{{route('datos')}}" class="btn btn-outline-danger btn-block">Rechazar <i class="far fa-times-circle"></i></a>
    </div>
    <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title  text-center">CONFIRMACION</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <h4>Presiona el boton de confirmar para mandar la revision de solicitud</h4>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a type="button"  class="btn btn-danger" data-dismiss="modal">Cancelar</a>
          <a href="{{route('finaliza')}}"  class="btn btn-success">Confirmar</a>
        </div>
        
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop