@extends('layouts.base')
@section ('contenido')

<!--=======================CATEGORIAS===========================-->
<link rel="stylesheet" type="text/css" href="/css/btns.css">
<script src="{{ asset('js/app.js') }}" defer></script>
  <div class="contenedor">
    <div class="row">
      <div class="col-md-8" >
    <div class="row">
      <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card">
          <div class="card-header d-flex p-0">
            <ul class="nav nav-pills ml-auto p-1">
              <li class="nav-item"><a class="nav-link active" href="#atraccion" data-toggle="tab"><i class="fas fa-th"></i> Atracción</a></li>
              <li class="nav-item"><a class="nav-link" href="#alimento" data-toggle="tab"><i class="fas fa-hamburger"> </i> Combos</a></li>
              <li class="nav-item"><a class="nav-link" href="#cocteles" data-toggle="tab"><i class="fas fa-cocktail"> </i>Cocteles</a></li>
              <li class="nav-item"><a class="nav-link" href="#coctelessin" data-toggle="tab"><i class="fas fa-glass-martini-alt"> </i>Cocteles sin alcohol</a></li>
              <li class="nav-item"><a class="nav-link" href="#copeo" data-toggle="tab"><i class="fas fa-glass-whiskey"> </i>Copeo</a></li>
              <li class="nav-item"><a class="nav-link" href="#botellas" data-toggle="tab"><i class="fas fa-wine-bottle"> </i>Botellas</a></li>
              <li class="nav-item"><a class="nav-link" href="#cervezas" data-toggle="tab"><i class="fas fa-beer"> </i>Cervezas</a></li>
              <!--<li class="nav-item"><a class="nav-link" href="#membresia" data-toggle="tab"><i class="fas fa-money-check-alt"> </i> Membresia</a></li>-->

            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="atraccion">
               <div class="row" id="botones">
@foreach ($producto as $tor)
@if($tor->categoria==2)
<div class="col-md-4 thumbex">
        <!-- Widget: user widget style 1 -->

        <div class="card card-widget widget-user botonesResponsivos">

            <button id="{{ $tor->idproducto }}" value="{{$tor->precio}}" name="{{$tor->nombre}}"  />

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="imagenPrincipal"
               style="--imgFondo: url('{{asset($tor->imagen_fondo)}}');">
            </div>

            <div class="widget-user-image  mb-5">
                <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
            </div>

            <div class="card-footer p-0 m-4 contenidoCard mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h1 class="text-sm">{{$tor->nombre}}</h1>
                            <h5 class="description-header description-text">${{$tor->precio}}.00</h5>
                            <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                        </div>
                    <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>

        <!-- /.widget-user -->
</div>
@endif
@endforeach
        </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="alimento">
               <div class="row" id="botones">

@foreach ($producto as $tor)
@if($tor->categoria==1)
    <div class="col-md-3 thumbex">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user botonesResponsivos">

            <button id="{{ $tor->idproducto }}" value="{{$tor->precio}}" name="{{$tor->nombre}}"/>

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="imagenPrincipal"
               style="--imgFondo: url('{{asset($tor->imagen_fondo)}}');">
            </div>

            <div class="widget-user-image  mb-5">
                <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
            </div>

            <div class="card-footer p-0 m-4 contenidoCard mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h1 class="text-sm">{{$tor->nombre}}</h1>
                            <h5 class="description-header description-text">${{$tor->precio}}.00</h5>
                            <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                        </div>
                    <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
        <!-- /.widget-user -->
@endif
      @endforeach
        </div>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="cocteles">
               <div class="row" id="botones">

@foreach ($producto as $tor)
@if($tor->categoria==3)
<div class="col-md-3 thumbex">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user botonesResponsivos">

            <button id="{{ $tor->idproducto }}" value="{{$tor->precio}}" name="{{$tor->nombre}}" />

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="imagenPrincipal"
               style="--imgFondo: url('{{asset($tor->imagen_fondo)}}');">
            </div>

            <div class="widget-user-image  mb-5">
                <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
            </div>

            <div class="card-footer p-0 m-4 contenidoCard mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h1 class="text-sm">{{$tor->nombre}}</h1>
                            <h5 class="description-header description-text">${{$tor->precio}}.00</h5>
                            <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                        </div>
                    <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
</div>
        <!-- /.widget-user -->
@endif
      @endforeach
        </div>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="coctelessin">
               <div class="row" id="botones">

@foreach ($producto as $tor)
@if($tor->categoria==4)
<div class="col-md-3 thumbex">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user botonesResponsivos">

            <button id="{{ $tor->idproducto }}" value="{{$tor->precio}}" name="{{$tor->nombre}}" />

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="imagenPrincipal"
               style="--imgFondo: url('{{asset($tor->imagen_fondo)}}');">
            </div>

            <div class="widget-user-image  mb-5">
                <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
            </div>

            <div class="card-footer p-0 m-4 contenidoCard mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h1 class="text-sm">{{$tor->nombre}}</h1>
                            <h5 class="description-header description-text">${{$tor->precio}}.00</h5>
                            <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                        </div>
                    <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
</div>
        <!-- /.widget-user -->
@endif
      @endforeach
        </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="copeo">
               <div class="row" id="botones">

@foreach ($producto as $tor)
@if($tor->categoria==5)
<div class="col-md-3 thumbex">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user botonesResponsivos">

            <button id="{{ $tor->idproducto }}" value="{{$tor->precio}}" name="{{$tor->nombre}}" />

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="imagenPrincipal"
               style="--imgFondo: url('{{asset($tor->imagen_fondo)}}');">
            </div>

            <div class="widget-user-image  mb-5">
                <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
            </div>

            <div class="card-footer p-0 m-4 contenidoCard mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h1 class="text-sm">{{$tor->nombre}}</h1>
                            <h5 class="description-header description-text">${{$tor->precio}}.00</h5>
                            <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                        </div>
                    <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
</div>
        <!-- /.widget-user -->
@endif
      @endforeach
        </div>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="botellas">
               <div class="row" id="botones">

@foreach ($producto as $tor)
@if($tor->categoria==6)
<div class="col-md-3 thumbex">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user botonesResponsivos">

            <button id="{{ $tor->idproducto }}" value="{{$tor->precio}}" name="{{$tor->nombre}}" />

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="imagenPrincipal"
               style="--imgFondo: url('{{asset($tor->imagen_fondo)}}');">
            </div>

            <div class="widget-user-image  mb-5">
                <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
            </div>

            <div class="card-footer p-0 m-4 contenidoCard mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h1 class="text-sm">{{$tor->nombre}}</h1>
                            <h5 class="description-header description-text">${{$tor->precio}}.00</h5>
                            <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                        </div>
                    <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
</div>
        <!-- /.widget-user -->
@endif
      @endforeach
        </div>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="cervezas">
               <div class="row" id="botones">

@foreach ($producto as $tor)
@if($tor->categoria==7)
<div class="col-md-3 thumbex">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user botonesResponsivos">

            <button id="{{ $tor->idproducto }}" value="{{$tor->precio}}" name="{{$tor->nombre}}" />

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="imagenPrincipal"
               style="--imgFondo: url('{{asset($tor->imagen_fondo)}}');">
            </div>

            <div class="widget-user-image  mb-5">
                <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
            </div>

            <div class="card-footer p-0 m-4 contenidoCard mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h1 class="text-sm">{{$tor->nombre}}</h1>
                            <h5 class="description-header description-text">${{$tor->precio}}.00</h5>
                            <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                        </div>
                    <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
</div>
        <!-- /.widget-user -->
@endif
      @endforeach
        </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="membresia">
                <form role="form">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
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
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
      </div>
      <!-- /.col -->
    </div>


        </div>
        <div id="app" class="col-md-4">
            <carrito>
            </carrito>
        </div>

    </div>

  </div>

  @endsection
