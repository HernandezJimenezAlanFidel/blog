@extends('layouts.base')
@section ('contenido')
<div class="row">
  <div class="col-12">
      <!-- /.card-header -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Comida  Ruta 66</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Tipo Tarjeta</th>
            <th>Fondo Disponible</th>
            <th>Opciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $tor)
          <tr>
            <td>{{ $tor->idcliente}}</td>
            <td>{{ $tor->nombre}}</td>
            <td>{{ $tor->telefono}}</td>
            <td>{{ $tor->tipotarjeta}}</td>
            <td>{{ $tor->fondotarjeta}}</td>
            <td>
              <a href="/editarcliente/{{$tor->idtarjeta}}"><i class="fa fa-edit"></i></a>
              <a href=""data-target="#modal-delete-{{$tor->idtarjeta}}" data-toggle="modal"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          @include('Modals.ModalMembresia')
        @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection
