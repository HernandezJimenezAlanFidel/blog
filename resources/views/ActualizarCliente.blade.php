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
        <form role="form" method="PUT" action="/actualizarcliente/{{$cliente->idcliente}}">

          <div class="card-body">
            <div class="form-group">
              <label for="nombre_cliente">Nombre del cliente</label>
              <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="{{$cliente->nombre}}" placeholder="Ingresa el nombre">
            </div>
            <div class="form-group">
              <label for="domicilio">Domicilio</label>
              <input type="text" class="form-control" id="domicilio_cliente" name="domicilio_cliente" value="{{$cliente->direccion}}" placeholder="Ingresa el domicilio">
            </div>

             <div class="form-group">
              <label for="telefono_cliente">Telefono</label>
              <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="{{$cliente->telefono}}" placeholder="Ingresa el numero telefonico">
            </div>
            <div class="form-group">
             <label for="correo">Correo</label>
             <input type="text" class="form-control" id="correo" name="correo" value="{{$cliente->correo}}" placeholder="Ingresa el numero telefonico">
           </div>
            <div class="form-group">
             <label for="id_tarjeta">Id Tarjeta</label>
             <input type="text" class="form-control" id="id_tarjeta" name="id_tarjeta" value="{{$cliente->idtarjeta}}" placeholder="Ingresa Id tarjeta asociado">
           </div>


            <div class="form-group">
             <!--sexo-->
               <label for="">Sexo</label>
               <select class="custom-select" name="sexo_cliente">
                 @if($cliente->sexo=='H')
                     <option value="H"selected>H</option>
                     <option value="M">M</option>
                 @else
                 <option value="H">H</option>
                 <option value="M"selected>M</option>
                 @endif
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
              <input type="date" value="{{$cliente->fecha_nac}}" class="form-control float-right" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->


          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">ActualizarCliente</button>
          </div>


        </form>


      </div>
      <!-- /.card -->

    </div>
    <!--/.col (left) -->
@endsection
