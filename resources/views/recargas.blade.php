@extends('layouts.base')
@section ('contenido')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8" >

<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info">$500</span>

        <div class="info-box-content">
          <span class="info-box-text">Texto Secundario</span>
          <button type="button" class="btn btn-block btn-primary btn-xs">Recargar</button>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-success">$400</span>

        <div class="info-box-content">
          <span class="info-box-text">Texto Secundario</span>
          <button type="button" class="btn btn-block btn-primary btn-xs">Recargar</button>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-warning">$300</span>

        <div class="info-box-content">
          <span class="info-box-text">Texto Secundario</span>
          <button type="button" class="btn btn-block btn-primary btn-xs">Recargar</button>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-danger">$200</span>

        <div class="info-box-content">
          <span class="info-box-text">Texto Secundario</span>
          <button type="button" class="btn btn-block btn-primary btn-xs">Recargar</button>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


      </div>



    <div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Costo del servicio</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Servicio</th>
                        <th></th>
                        <th style="width: 40px">Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>MarioKart</td>
                        <td>
                          <div class="progress progress-xs"></div>
                        </td>
                        <td>$55</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Tubugan</td>
                        <td>
                          <div class="progress progress-xs"></div>
                        </td>
                        <td>$75</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Gotcha</td>
                        <td>
                          <div class="progress progress-xs"></div>
                        </td>
                        <td>$155</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- Button -->
        <!--Ojo.--El boton se encuentra dentro de la tabla-->
        <input type="submit" value="Generar costo" class="btn btn-success float-right">
      </div>
    </div>

  </div>

</div>
@endsection
