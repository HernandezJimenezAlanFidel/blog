<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css"> <script src="script.js"></script>
    </head>
    <body>
        <div class="ticket">
            <!--<img src="{{asset('dist/img/logo2.png')}}"    alt="Logotipo">-->
            <p class="centrado">Bldv, Guadalupe Hinojosa de Murat Km 3.5
                <br>Santa Cruz Xoxocotlan
                <br><?php echo date("d") . "/" . date("m") . "/" . date("Y") ."   ".date("G").":".date("i").":".date("s");?></p>
            <table>
                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="producto">PRODUCTO</th>
                        <th class="precio">$$</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cantidad">1.00</td>
                        <td class="producto">CHEETOS VERDES 80 G</td>
                        <td class="precio">$8.50</td>
                    </tr>
                    <tr>
                        <td class="cantidad">2.00</td>
                        <td class="producto">KINDER DELICE</td>
                        <td class="precio">$10.00</td>
                    </tr>
                    <tr>
                        <td class="cantidad">1.00</td>
                        <td class="producto">COCA COLA 600 ML</td>
                        <td class="precio">$10.00</td>
                    </tr>
                    <tr>
                        <td class="cantidad"></td>
                        <td class="producto">TOTAL</td>
                        <td class="precio">$28.50</td>
                    </tr>
                </tbody>
            </table>
            <p class="centrado">¡GRACIAS POR SU COMPRA!
                <br>parzibyte.me</p>
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
