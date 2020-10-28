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
        <form role="form" method="POST" action="/crearcliente">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nombre_cliente">Nombre del cliente</label>
              <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Ingresa el nombre completo">
            </div>
            <div class="form-group">
              <label for="domicilio">Domicilio</label>
              <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ingresa el domicilio">
            </div>

             <div class="form-group">
              <label for="telefono_cliente">Telefono</label>
              <input required type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="ingresa el número Telefonico">
            </div>
            <div class="form-group">
             <label for="correo">Correo</label>
             <input type="text" class="form-control" id="correo" name="correo" value="" placeholder="Ingresa el numero telefonico">
           </div>
            <div class="form-group">
             <label for="id_tarjeta">Id Tarjeta</label>
             <input type="text" class="form-control" id="id_tarjeta" name="id_tarjeta" value="" placeholder="Ingresa Id tarjeta asociado">
           </div>

            <div class="form-group">
             <!--sexo-->
               <label for="sexo_cliente">Sexo</label>
               <select required class="custom-select" id="sexo_cliente" name="sexo_cliente">
                <option value="">Escoja opcion</option>
                <option value="H">H</option>
                <option value="M">M</option>
              </select>
            </div>

            <!-- Date range -->
          <div class="form-group">
            <label for="fecha_nacimiento">Fecha de nacimiento</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="date" required class="form-control float-right" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->


          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>


        </form>


      </div>
      <!-- /.card -->

    </div>
    <!--/.col (left) -->
@endsection
