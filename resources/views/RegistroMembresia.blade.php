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
        <form role="form">
          <div class="card-body">

              <div class="form-group">
                  <label>Tipo de membresia</label>
                  <select class="custom-select">
                     <option value="">Escoja opcion</option>
                     <option value="0">Bronce</option>
                     <option value="1">Plata</option>
                     <option value="2">Oro</option>
                  </select>
                </div>

            <div class="form-group">
              <label for="preciomembresia">Precio</label>
              <input type="number" class="form-control" id="presio_membresia" placeholder="cantidad disponible" step="0" min="0">
            </div>
            <div class="form-group">
              <label for="fondomembresia">Fondo</label>
              <input type="number" class="form-control" id="fondo_membresia" placeholder="precio del producto" step="0" min="0">
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
