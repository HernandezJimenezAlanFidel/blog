<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css"> <script src="script.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    </head>
    <body>
        <div class="ticket">
            <img src="{{asset('dist/img/logo2.png')}}" alt="Logotipo">
            <p class="centrado">Ruta 66
              <br>Bldv, Guadalupe Hinojosa de Murat Km 3.5
                <br>Santa Cruz Xoxocotlan
                <br><?php echo date("d") . "/" . date("m") . "/" . date("Y") ."   ".date("G").":".date("i").":".date("s");?>
                <br>#{{$idVenta}}</p>

            <table style="text-align: center;">
                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="producto">PRODUCTO</th>
                        <th class="precio">$$</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($producto as $tor)
                    <tr>
                        <td class="cantidad">{{$tor->cantidad}}</td>
                        <td class="producto">{{$tor->nombre}}</td>
                        <td class="precio">${{$tor->monto}}</td>
                    </tr>
                  @endforeach
                  <tr>
                      <td class="cantidad"></td>
                      <td class="producto">Total</td>
                      <td class="precio">${{$totalventa}}</td>
                  </tr>
                </tbody>
            </table>
            <p class="centrado">¡GRACIAS POR SU COMPRA!
                <br>Ruta 66</p>
        </div>
    </body>
    <script>
    window.onload = function() {
    //  window.print();
      //window.location.href = "/";
};


    </script>
    <style>
    * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.producto,
th.producto {
    width: 75px;
    max-width: 75px;
}

td.cantidad,
th.cantidad {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.precio,
th.precio {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centrado {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}
@media print {
    .oculto-impresion,
    .oculto-impresion * {
        display: none !important;
    }
}
    </style>
</html>
