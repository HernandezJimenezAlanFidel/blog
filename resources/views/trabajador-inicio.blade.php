@extends('layouts.base')
@section ('contenido')
<section class="content">
  <div class="row">
    <div class="col-12">
        <!-- /.card-header -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Empleados  Ruta 66</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>tipo de empleado</th>
              <th>email</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($empleado as $tor)
            <tr>
              <td>{{ $tor->idempleado}}</td>
              <td>{{ $tor->nombre}}</td>
              <td>{{ $tor->tipo}}</td>
              <td>{{ $tor->email}}</td>
              <td>
                <a href="/editarempleado/{{$tor->idempleado}}"><i class="fa fa-edit"></i></a>
                <a href=""data-target="#modal-delete-{{$tor->idempleado}}" data-toggle="modal"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @include('Modals.ModalEmpleado')
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
   <i class="fas fa-user"></i> Producto
  </a>
  <!-- /.row -->
</section>
@endsection
