@extends('layouts.base')
@section ('contenido')

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
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
        <form role="form" method="post" action="/actualizarproducto/{{$producto->idproducto}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nombreproducto">idproducto</label>
              <input type="number" class="form-control" id="id_producto" name="id_producto" value="{{$producto->idproducto}}" placeholder="ingresa el nombre del producto">
            </div>
            <div class="form-group">
              <label for="nombreproducto">Nombre del producto</label>
              <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{$producto->nombre}}" placeholder="ingresa el nombre del producto">
            </div>
            <div class="form-group">
              <label for="catitadproducto">Cantidad</label>
              <input type="number" class="form-control" id="cantidad_producto" name="cantidad_producto" value="{{$producto->cantidad}}" placeholder="cantidad disponible" step="0" min="0">
            </div>
            <div class="form-group">
              <label for="precioproducto">Precio</label>
              <input type="text" class="form-control" id="precio_producto" name="precio_producto" value="{{$producto->precio}}" placeholder="precio del producto"   step="0" min="0">
            </div>
            <div class="form-group row">
              <label for="tipo">Categoria</label>

              <select class="form-control" name="categoria_producto" id="categoria_producto">
                @if ($producto->categoria == 1)
                <option value="1" selected>Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6">Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8">Membresia</option>
                @elseif ($producto->categoria == 2)
                <option value="1" >Alimento</option>
                <option value="2" selected>Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6">Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8">Membresia</option>
                @elseif ($producto->categoria == 3)
                <option value="1">Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3" selected>Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6">Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8">Membresia</option>
                @elseif ($producto->categoria == 4)
                <option value="1" >Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4" selected>Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6">Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8">Membresia</option>
                @elseif ($producto->categoria == 5)
                <option value="1">Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5"selected>Copeo</option>
                <option value="6">Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8">Membresia</option>
                @elseif ($producto->categoria == 6)
                <option value="1">Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6" selected>Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8">Membresia</option>
                @elseif ($producto->categoria == 7)
                <option value="1">Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6">Botellas</option>
                <option value="7" selected>Cervezas</option>
                <option value="8">Membresia</option>
                @else
                <option value="1">Alimento</option>
                <option value="2">Atracciones</option>
                <option value="3">Cocteles</option>
                <option value="4">Cocteles sin alcohol</option>
                <option value="5">Copeo</option>
                <option value="6">Botellas</option>
                <option value="7">Cervezas</option>
                <option value="8" selected>Membresia</option>
                @endif
              </select>

            </div>
            <div class="form-group">
              <label for="exampleInputFile">Imagen Actual</label>
              <br>
               <img src="{{$producto->imagen}}" alt="alternatetext" id="imagen">
               <br>
               <label for="exampleInputFile">Buscar Imagen</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" accept="image/*" name="imagen" class="custom-file-input" id="imagen">
                  <label class="custom-file-label" for="imagen">Buscar archivo</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Imagen Fondo Actual</label>
              <br>
               <img src="{{$producto->imagen_fondo}}" alt="alternatetext" id="imagen">
               <br>
               <label for="exampleInputFile">Buscar Imagen Fondo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" accept="image/*" name="imagenfondo" class="custom-file-input" id="imagenfondo">
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
