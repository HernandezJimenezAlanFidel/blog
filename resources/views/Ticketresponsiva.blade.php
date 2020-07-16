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
            <img src="{{asset('/dist/img/LOGO2.png')}}"    alt="Logotipo">
            <p class="centrado">Ruta 66
              <br>Bldv, Guadalupe Hinojosa de Murat Km 3.5
                <br>Santa Cruz Xoxocotlan
                <br><?php echo date("d") . "/" . date("m") . "/" . date("Y") ."   ".date("G").":".date("i").":".date("s");?>
                <br></p>
                <p class="centrado" style="text-align: center;">Ruta 66
                  Responsiva
                  A traves de la presente, hago constar que el C._____________________  responsable,
                   está enterado del riesgo que conlleva el uso inadecuado de nuestras atracciones de igual
                   manera se compromete a cumplir con el reglamento de nuestras instalaciones y deslindó de
                   toda responsabilidad a RUTA 66 FOODTRUCK</p>

            <p class="centrado">¡GRACIAS POR SU PREFERENCIA!
                <br>Ruta 66</p>
        </div>
    </body>
    <script>
    window.onload = function() {
      window.print();
      window.location.href = "/";
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
