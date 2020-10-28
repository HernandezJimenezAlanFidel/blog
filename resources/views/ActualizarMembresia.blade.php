@extends('layouts.base')
@section ('contenido')

<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Datos de la membresia</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="PUT" action="/actualizarmembresia/{{$tarjeta->idtarjeta}}">
          <div class="card-body">

            <div class="form-group">
              <label for="preciomembresia">Id Tarjeta</label>
              <input type="text" class="form-control" id="id_tarjeta" placeholder="Ingrese Id Tarjeta" value="{{$tarjeta->idtarjeta}}">
            </div>
            <div class="form-group">
              <label for="fondo_membresia">Fondo</label>
              <input type="number" class="form-control" name="fondo_membresia" id="fondo_membresia" placeholder="fondo de la tarjeta" step="1" min="0"
              value="{{$tarjeta->fondo_disponible}}">
            </div>

            <div class="form-check">
              @if($tarjeta->activo==1)
              <input type="checkbox" class="form-check-input" name= "activo" id="activo" value="activo" checked>
              @else
              <input type="checkbox" class="form-check-input" name= "activo" id="activo" value="activo">
              @endif
              <label class="form-check-label" for="activo">Activo</label>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
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
