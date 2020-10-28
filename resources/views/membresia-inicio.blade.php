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
              <th>idtarjeta</th>
              <th>Tipo</th>
              <th>fondo_disponible</th>
              <th>Estado</th>
              <th>Opciones</th>

            </tr>
            </thead>
              <tbody>
                @foreach ($clientes as $tor)
                <tr>
                <td>{{ $tor->idtarjeta}}</td>
                <td>{{ $tor->tipo}}</td>
                <td>{{ $tor->fondo_disponible}}</td>
                @if($tor->activo==1)
                <td>Activo</td>
                @else
                <td>Desactivada</td>
                @endif
                <td>
                  <a href="/editarmembresia/{{$tor->idtarjeta}}"><i class="fa fa-edit"></i></a>
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
    <i class="fas fa-credit-card"></i> Membresia
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

@endsection
