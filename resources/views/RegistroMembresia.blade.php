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
        <form role="form" method="POST" action="/creartarjeta">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <label for="preciomembresia">Id Tarjeta</label>
              <input type="text" class="form-control" id="id_tarjeta" name="id_tarjeta" placeholder="Ingrese Id Tarjeta">
            </div>
            <div class="form-group">
              <label for="fondomembresia">Fondo</label>
              <input type="number" class="form-control" name="fondo_membresia" id="fondo_membresia" value=0 placeholder="fondo de la tarjeta" step="0" min="0">
            </div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" name= "actvo" id="activo" value="activo">
              <label class="form-check-label" for="activo">Activo</label>
            </div>
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
