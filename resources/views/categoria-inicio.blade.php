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
              <th>idproduto</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Precio</th>
              <th>Categoria</th>
              <th>Opciones</th>

            </tr>
            </thead>
              <tbody>
                @foreach ($producto as $tor)
                <tr>
                <td>{{ $tor->idproducto}}</td>
                <td>{{ $tor->nombre}}</td>
                <td>{{ $tor->cantidad}}</td>
                <td>{{ $tor->precio}}</td>
                @if ($tor->categoria == 1)
                <td>Alimento</td>
                @elseif ($tor->categoria == 2)
                <td>Atraccion</td>
                @elseif ($tor->categoria == 3)
                <td>Cocteles</td>
                @elseif ($tor->categoria == 4)
                <td>Coctles sin alcohol</td>
                @elseif ($tor->categoria == 5)
                <td>Copeo</td>
                @elseif ($tor->categoria == 6)
                <td>Botellas</td>
                @elseif ($tor->categoria == 7)
                <td>Cervezas</td>
                @else
                <td>Membresia</td>
                @endif
                <td>
                  <a href="/editarproducto/{{$tor->idproducto}}"><i class="fa fa-edit"></i></a>
                <a href=""data-target="#modal-delete-{{$tor->idproducto}}" data-toggle="modal"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
                @include('Modals.ModalProducto')
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

   <a href="/registroproducto" class="btn btn-app">
    <span class="badge bg-purple"><i class="fas fa-plus-circle"> Agregar</i></span>
    <i class="fas fa-barcode"></i> Producto
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
