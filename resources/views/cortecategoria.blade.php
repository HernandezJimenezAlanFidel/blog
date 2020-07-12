<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Corte de caja</title>
<style>

 .col-md-12 {
    width: 100%;
}

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ECF0F5;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
}

 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #f4f4f4;
}

.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}

.bg-red {
    background-color: #dd4b39 !important;
}


</style>
</head>
<body>
<div class="col-md-12">
<h3>Fecha corte: {{$fecha}} </h3>
<h4>Usuario: {{auth()->user()->name}}</h4>
<h4>Fecha de elaboracion: <?php echo date("d") . " del " . date("m") . " de " . date("Y");?></h4>

        <div class="box">
              <div class="box-body">
                  <table class="table table-bordered" style="text-align: center;">
                      <thead>
                          <tr>
                              <th>Idventa</th>
															<th>Usuario</th>
															<th>producto</th>
															<th>cantidad</th>
                              <th>Monto</th>
															<th>Metodo de pago</th>
                              <th>Fecha</th>
                          </tr>
                      </thead>
                      <tbody>
												@foreach ($venta as $ventas)
                          <tr>
      												<td>{{$ventas->idventa}}</td>
      												<td>{{$ventas->idusuario}}</td>
      												<td>{{$ventas->nombreproducto}}</td>
      												<td>{{$ventas->cantidadventa}}</td>
															<td>{{$ventas->montoventa}}</td>
															@if($ventas->metodopago==1)
      												<td>efectivo</td>
															@else
															<td>Tarjeta debito</td>
															@endif
															<td>{{$ventas->fecha_venta}}</td>
											    </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
              <div class="box-footer clearfix">
                  <div class="col-md-12">
                      <label for="" name="totalIngresos">Total de ventas : ${{$totalIngresos}}</label>
                              <br><br>

                  </div>
              </div>
          </div>
      </div>
		</body>
		</html>
