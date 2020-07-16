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
        <form role="form" method="POST" action="/crearproducto" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nombreproducto">idproducto</label>
              <input type="number" class="form-control" id="id_producto" name="id_producto" placeholder="ingresa el nombre del producto">
            </div>
            <div class="form-group">
              <label for="nombreproducto">Nombre del producto</label>
              <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="ingresa el nombre del producto">
            </div>
            <div class="form-group">
              <label for="catitadproducto">Cantidad</label>
              <input type="number" class="form-control" id="cantidad_producto" name="cantidad_producto" placeholder="cantidad disponible" step="0" min="0">
            </div>
            <div class="form-group">
              <label for="precioproducto">Precio</label>
              <input type="text" class="form-control" id="precio_producto" name="precio_producto" placeholder="precio del producto" step="0" min="0">
            </div>
            <div class="form-group row">
              <label for="tipo">Categoria</label>

              <select class="form-control" name="categoria_producto" id="categoria_producto">
                <option value="1" selected>Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6">Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8">Membresia</option>
              </select>

            </div>
            <div class="form-group">
              <label for="exampleInputFile">Subir Imagen</label>
              <div class="input-group">
                <div class="custom-file">
                  <input accept="image/*" type="file" name="imagen" class="custom-file-input" id="imagen">
                  <label class="custom-file-label" for="imagen">Buscar archivo</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Subir Imagen Fondo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input accept="image/*" type="file" name="imagenfondo" class="custom-file-input" id="imagenfondo">
                  <label class="custom-file-label" for="imagenfondo">Buscar archivo</label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>


        </form>
      </div>
@endsection
