@extends('layouts.base')
@section ('contenido')

<div class="row">

</div>
<div class="row">
  <div class="col-12">
      <!-- /.card-header -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Membresia  Ruta 66</h3>

      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered table-sm">
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
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<a href="/registromembresia" class="btn btn-app">
 <span class="badge bg-purple"><i class="fas fa-plus-circle"> Agregar</i></span>
 <i class="fas fa-credit-card"></i> Miembro
</a>
<script src="{{asset('https://code.jquery.com/jquery-3.3.1.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}">
<script>
	$(document).ready(function() {
    $('#example1').DataTable({
      "searching": true // false to disable search (or any other option)
    });
    $('.dataTables_length').addClass('bs-select');
	} );
</script>
<!-- /.row -->
@endsection
