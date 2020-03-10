@extends('layouts.base')
@section ('contenido')

<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Datos del producto</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="nombreproducto">Nombre del producto</label>
              <input type="text" class="form-control" id="nombre_producto" placeholder="ingresa el nombre del producto">
            </div>
            <div class="form-group">
              <label for="catitadproducto">Cantidad</label>
              <input type="number" class="form-control" id="cantidad_producto" placeholder="cantidad disponible" step="0" min="0">
            </div>
            <div class="form-group">
              <label for="precioproducto">Precio</label>
              <input type="number" class="form-control" id="precio_producto" placeholder="precio del producto" step="0" min="0">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Subir archivo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Buscar archivo</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Subir</span>
                </div>
              </div>
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
@endsection
