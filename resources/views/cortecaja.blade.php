@extends('layouts.base')
@section ('contenido')

<div class="content-wrapper" style="min-height: 1074px;">
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

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
      <form role="form" method="GET" action="/crearreporte">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">

                <tbody>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Seleccione tipo de corte</label>
                        <select id="tipocorte" name="tipocorte"class="form-control" onchange="Cambio()">
                          <option value="0" selected>Dia</option>
                          <option value="1">Rango</option>
                        </select>
                      </div>
                    </div>


                  <div class="row">
                    <div class="col-sm-10">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Corte por:</label>
                        <select class="form-control" id="categoria" name="categoria">
                          <option value ="0" selected>Todo</option>
                          <option value="1">Alimento</option>
                          <option value="2">Atracciones</option>
                          <option value="3">Cocteles</option>
                          <option value="4">Cocteles sin alcohol</option>
                          <option value="5">Copeo</option>
                          <option value="6">Botellas</option>
                          <option value="7">Cervezas</option>
                          <option value="8">Membresia</option>
                        </select>
                      </div>
                    </div>
                    </div>

                  </div>
                  <div class="row" id="rango">
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label>Rango de fecha:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control datepicker" id="reservation" name="reservation">
                  </div>

                </div>
              </div>
              </div>
              <div class="row" id="dia">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Dia:</label>
                      <div class="input-group date" id="reservationdate" name="reservationdate" data-target-input="nearest">
                          <input type="text" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
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
  </form>
   <!-- Main content -->





</div>
</div>
<script>
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker(
      {
        startDate: moment().subtract('days', 7),
          endDate: moment(),
          maxDate: moment().endOf('day'),

      }
    );
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD',
        maxDate: moment().endOf('day'),
    });

  });
</script>
<script>
$( document ).ready(function() {
  $('#rango').hide();

});
function Cambio() {

  var x = document.getElementById("tipocorte").value;
  if(x=="0")
  {
    $('#dia').show(); //muestro mediante id
    $('#rango').hide(); //muestro mediante id
  }
  else {
    $('#dia').hide(); //muestro mediante id
    $('#rango').show(); //muestro mediante id
  }
}
</script>

@endsection
