@extends('layouts.base')
@section ('contenido')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Datos del cliente</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="nombrecliente">Nombre del cliente</label>
              <input type="text" class="form-control" id="nombre_cliente" placeholder="ingresa el nombre">
            </div>
            <div class="form-group">
              <label for="apellidopcliente">Apellido paterno</label>
              <input type="text" class="form-control" id="apellidop_cliente" placeholder="ingresa el apellido parterno">
            </div>
           <div class="form-group">
              <label for="apellidomcliente">Apellido materno</label>
              <input type="text" class="form-control" id="apellidom_cliente" placeholder="ingresa el apellido materno">
            </div>
            <div class="form-group">
              <label for="callecliente">Calle</label>
              <input type="text" class="form-control" id="calle_cliente" placeholder="ingresa el nombre de la calle">
            </div>
            <div class="form-group">
              <label for="coloniacliente">Colonia</label>
              <input type="text" class="form-control" id="colonia_cliente" placeholder="ingresa el nombre de la colonia">
            </div>

             <div class="form-group">
              <label for="numeroccliente">Número</label>
              <input type="text" class="form-control" id="numero_cliente" placeholder="ingresa el número de la casa">
            </div>

            <div class="form-group">
              <label for="localidadcliente">Localidad</label>
              <input type="text" class="form-control" id="localidad_cliente" placeholder="ingresa el nombre de la localidad">
            </div>

             <div class="form-group">
              <label for="estadocliente">Localidad</label>
              <input type="text" class="form-control" id="estado_cliente" placeholder="ingresa el nombre del estado">
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

            <!-- Date range -->
          <div class="form-group">
            <label>Fecha de nacimiento</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="date" class="form-control float-right" id="fechaNacimiento_cliente" name="fecha_nacimiento">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

            <!-- Date range -->
          <div class="form-group">
            <label>Fecha de registro</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="date" class="form-control float-right" id="fechaRegistro_cliente" name="fecha_registro">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->



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
@endsection
