@extends('layouts.base')
@section ('contenido')


  <div class="row">
    <div class="col-12">
        <!-- /.card-header -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Clientes Ruta 66</h3>

        </div>

        <!-- /.card-header -->
        <div id="app" class="card-body">
          <table id="table_rutas" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>idcliente</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Sexo</th>
              <th>Correo</th>
              <th>Membresia</th>
              <th>Opciones</th>

            </tr>
            </thead>
              <tbody>
                  @foreach ($clientes as $tor)
          			<tr>
          				<td>{{ $tor->idcliente}}</td>
                  <td>{{ $tor->nombre}}</td>
          				<td>{{ $tor->direccion}}</td>
          				<td>{{ $tor->telefono}}</td>
                  <td>{{ $tor->sexo}}</td>
          				<td>{{ $tor->correo}}</td>
                  <td>{{ $tor->idtarjeta}}</td>

          				<td>
          					<a href="/editarcliente/{{$tor->idcliente}}"><i class="fa fa-edit"></i></a>
                    <a href=""data-target="#modal-delete-{{$tor->idcliente}}" data-toggle="modal"><i class="fas fa-trash"></i></a>
          				</td>
          			</tr>
                @include('Modals.ModalCliente')
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

   <a href="/registrocliente" class="btn btn-app">
    <span class="badge bg-purple"><i class="fas fa-plus-circle"> Agregar</i></span>
    <i class="fas fa-users"></i> Cliente
   </a>
  <!-- /.row -->
  <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
	$(document).ready(function() {
    	$('#table_rutas').DataTable();
	} );
</script>
  <!--<script>
    $( function () {
      $("#table_rutas").DataTable();
      $('#table_rutas').DataTable( {
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
</script>-->
@endsection
