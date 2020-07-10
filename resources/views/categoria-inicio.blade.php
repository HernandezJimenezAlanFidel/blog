@extends('layouts.base')
@section ('contenido')
<section class="content">
  <div class="row">
    <div class="col-12">
        <!-- /.card-header -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Productos  Ruta 66</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Costo</th>
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
              @else
              <td>Atraccion</td>
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
</section>
@endsection
