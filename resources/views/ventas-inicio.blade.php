@extends('layouts.base')
@section ('contenido')

<div class="row">
    <div class="col-12">
        <!-- /.card-header -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ventas Realizadas Ruta 66</h3>
        </div>

        <!-- /.card-header -->
        <div id="app" class="card-body">
          <table id="table_rutas" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>idventa</th>
              <th>Fecha</th>
              <th>Productos</th>
              <th>Forma de Pago</th>
              <th>Total</th>
              <th>Opciones</th>
            </tr>
        </thead>
          <tbody>
            @for ($venta = 0; $venta < sizeof($ventas); $venta++)
            <tr>
            <td>{{ $ventas[$venta]->idventa}}</td>
            <td>{{ \Carbon\Carbon::parse($ventas[$venta]->fecha_venta)->diffForHumans() }}</td>
            <td>
                <table id="table_rutas" class="table table-sm">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos[$venta] as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>$ {{ $producto->precio }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->monto }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
            @if ($ventas[$venta]->metodo_pago == 1)
            <td>Efectivo</td>
            @else
            <td>Tarjeta de Credito</td>
            @endif
            <td>$ {{ $ventas[$venta]->total}}</td>
            <td>
              <a href="/impresionTicket?id={{ $ventas[$venta]->idventa }}"><i class="fas fa-print"></i></a>
              <a href=""data-target="#modal-delete-{{$ventas[$venta]->idventa}}" data-toggle="modal"><i class="fas fa-trash"></i></a>
            </td>
            </tr>
            @include('Modals.ModalVenta')
            @endfor

          </tbody>
      </table>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>




<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
	$(document).ready(function() {
    	$('#table_rutas').DataTable( {
            "iDisplayLength": 3,
            "aLengthMenu": [[3, 6, 9, -1], [3, 6, 9, "All"]],
            "order": [[ 1, 'asc' ]]
          }
        );
	} );
</script>
@endsection
