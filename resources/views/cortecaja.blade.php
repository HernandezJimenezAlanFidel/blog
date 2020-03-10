@extends('layouts.base')
@section ('contenido')

<div class="content-wrapper" style="min-height: 1074px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Categorias</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Ruta 66</a></li>
            <li class="breadcrumb-item active">Sistema de Ventas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!--=========================RECARGAS=======================================0-->
  <div class="col-md-8">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Generar corte</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">

                <tbody>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Fecha Inicio</label>
                        <select class="form-control">
                          <option>Abril/2020</option>
                          <option>Mayo/2020</option>
                          <option>Junio/2020</option>
                          <option>Julio/2020</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Fecha Final</label>
                        <select class="form-control">
                          <option>Abril/2020</option>
                          <option>Mayo/2020</option>
                          <option>Junio/2020</option>
                          <option>Julio/2020</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Corte por:</label>
                        <select multiple class="custom-select">
                          <option>Producto</option>
                          <option>Categoria</option>
                          <option>Membresia</option>
                          <option>Comida</option>
                          <option>otra</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">

                      </div>
                    </div>
                  </div>

                </tbody>
              </table>
            </div>

        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- Button -->
    <!--Ojo.--El boton se encuentra dentro de la tabla-->
    <input type="submit" value="Generar corte" class="btn btn-success float-right">
  </div>
   <!-- Main content -->





</div>
</div>
