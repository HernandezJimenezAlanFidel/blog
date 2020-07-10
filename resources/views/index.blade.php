@extends('layouts.base')
@section ('contenido')

<!--=======================CATEGORIAS===========================-->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" >
    <div class="row">
      <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card">
          <div class="card-header d-flex p-0">
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="#atraccion" data-toggle="tab"><i class="fas fa-th"></i> Atracción</a></li>
              <li class="nav-item"><a class="nav-link" href="#alimento" data-toggle="tab"><i class="fas fa-hamburger"> </i> Alimento</a></li>
              <li class="nav-item"><a class="nav-link" href="#membresia" data-toggle="tab"><i class="fas fa-money-check-alt"> </i> Membresia</a></li>

            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="atraccion">
               <div class="row" id="botones">
@foreach ($producto as $tor)
<div class="col-md-4">
        <!-- Widget: user widget style 1 -->

        <div class="card card-widget widget-user">
          <button value="{{$tor->precio}}" name="{{$tor->nombre}}">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white"
               style="background: url('dist/img/photo1.png')center center;" id="fondo">
          </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar" id="imagen">
        </div>
          <div class="card-footer p-0 m-4">
            <div class="row">
              <div class="col-sm-12">
                <div class="description-block">
                  <span class="text-sm">{{$tor->nombre}}</span>
                  <h5 class="description-header description-text">${{$tor->precio}}.00</h5>

                  <span class="badge bg-purple"><i class="fas fa-plus-circle"> {{$tor->cantidad}}</i></span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
          </div>
        </button>
        </div>

        <!-- /.widget-user -->
</div>
@endforeach
        </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="alimento">
                <div class="card-footer"> BEBIDA</div>
               <div class="row" id="botones">

@foreach ($producto as $tor)

<div class="col-md-3">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <button value="{{$tor->precio}}" name="{{$tor->nombre}}" id="boton"/>

          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white"
               style="background: url('dist/img/photo1.png') center center;"id="fondo2">
          </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar"id="imagen">
        </div>
          <div class="card-footer p-0 m-4">
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

      @endforeach
        </div>

<div class="card-footer"> BEBIDA CON ALCOHOL</div>
               <div class="row" id="botones">


                 @foreach ($producto as $tor)

                 <div class="col-md-3">
                         <!-- Widget: user widget style 1 -->
                         <div class="card card-widget widget-user">
                           <button value="{{$tor->precio}}" name="{{$tor->nombre}}">
                           <!-- Add the bg color to the header using any of the bg-* classes -->
                           <div class="widget-user-header text-white"
                                style="background: url('dist/img/photo1.png') center center;" id="fondo2">
                           </div>
                         <div class="widget-user-image">
                           <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar" id="imagen">
                         </div>
                           <div class="card-footer p-0 m-4">
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

                       @endforeach
</div>


<div class="card-footer"> COMIDA</div>
               <div class="row" id="botones">


                 @foreach ($producto as $tor)

                 <div class="col-md-3">
                         <!-- Widget: user widget style 1 -->
                         <div class="card card-widget widget-user">
                           <button value="{{$tor->precio}}" name="{{$tor->nombre}}">
                           <!-- Add the bg color to the header using any of the bg-* classes -->
                           <div class="widget-user-header text-white"
                                style="background: url('dist/img/photo1.png') center center;" id="fondo2">
                           </div>
                         <div class="widget-user-image">
                           <img class="img-circle" src="{{asset($tor->imagen)}}" alt="User Avatar" id="imagen">
                         </div>
                           <div class="card-footer p-0 m-4">
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
                    <table id="tablaventa" class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Servicio</th>
                          <th style="width: 40px">Precio</th>
                          <th>..</th>

                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <script src="https://code.jquery.com/jquery-2.0.3.js"></script>
          <script type="text/javascript">

$(document).ready(function(){
    /**
     * Funcion para añadir una nueva columna en la tabla
     */
     $("#botones button").click(function(){
       var filas=$("#tablaventa").length;
       var nuevaFila="<tr>";
           nuevaFila+="<td>"+"#"+filas;+"</td>";
           nuevaFila+="<td>"+$(this).attr('name')+"</td>";
           nuevaFila+="<td><input type=\"text\" id=\"cantidad_producto\" name=\"precio_producto\" placeholder=\" \" step=\"0\" min=\"0\"></td>"
           nuevaFila+="<td>$"+$(this).val()+"</td>";
           nuevaFila+="<td><a id=\"eliminar\"href=\"\"  data-toggle=\"modal\"><i class=\"fas fa-trash\"></i></a></td>"

       nuevaFila+="</tr>";
       $("#tablaventa").append(nuevaFila);

   })

   $("#tablaventa").on('click', '#eliminar', function () {
     $(this).closest('tr').remove();
 });
});


</script>

          <!-- Button -->
          <!--Ojo.--El boton se encuentra dentro de la tabla-->
          <input type="submit" value="Generar costo" class="btn btn-success float-right">
        </div>
      </div>

    </div>

  </div>

  @endsection
