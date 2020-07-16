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
        <div class="card-body">
          <table id="table_rutas" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>idempleado</th>
              <th>Nombre</th>
              <th>Tipo</th>
              <th>Email</th>
              <th>Opciones</th>

            </tr>
            </thead>
              <tbody>
                @foreach ($empleado as $tor)
                @if($tor->activo==1)
                <tr>
                <td>{{ $tor->idempleado}}</td>
                <td>{{ $tor->nombre}}</td>
                <td>{{ $tor->tipo}}</td>
                <td>{{ $tor->email}}</td>
                <td>
                  <a href="/editartrabajador/{{$tor->idempleado}}"><i class="fa fa-edit"></i></a>
                  <a href=""data-target="#modal-delete-{{$tor->idempleado}}" data-toggle="modal"><i class="fas fa-trash"></i></a>
                </td>
                </tr>

                @include('Modals.ModalEmpleado')
                @endif
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

   <a href="/registrotrabajador" class="btn btn-app">
    <span class="badge bg-purple"><i class="fas fa-plus-circle"> Agregar</i></span>
    <i class="fas fa-user"></i> Trabajador
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
