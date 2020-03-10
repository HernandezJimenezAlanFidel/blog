@extends('layouts.base')
@section ('contenido')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Datos del trabajador</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="nombrecliente">Nombre</label>
              <input type="text" class="form-control" id="nombre_usuario" placeholder="ingresa el nombre">
            </div>
            <div class="form-group">
              <label for="apellidopcliente">Apellido paterno</label>
              <input type="text" class="form-control" id="apellidop_usuario" placeholder="ingresa el apellido parterno">
            </div>
           <div class="form-group">
              <label for="apellidomcliente">Apellido materno</label>
              <input type="text" class="form-control" id="apellidom_usuario" placeholder="ingresa el apellido materno">
            </div>
            <div class="form-group">
              <label for="callecliente">Usuario</label>
              <input type="username" class="form-control" id="nombre_usuario" placeholder="ingresa el usuario">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password_usuario" placeholder="ingresa la contraseña">
            </div>


            <div class="form-group">
             <!--sexo-->
               <label for="">Sexo</label>
               <select class="custom-select" name="sexo_cliente">
                <option value="">Escoja opcion</option>
                <option value="0">H</option>
                <option value="1">M</option>
              </select>
            </div>





            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>


        </form>
      </div>
      <!-- /.card -->

    </div>
    <!--/.col (left) -->

            </div>
            <div class="form-group">
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
