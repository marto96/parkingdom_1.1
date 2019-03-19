<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>

    <div class="contenedor">
        <img src="../../imagenes/logoimp.svg" alt="Parkingdom" style="width:200px;">
       
            <p> Cl. 52 a Sur # 77 h 24, Bogotá - Colombia</p>
             <div class="parte1">
            <strong  style="font-size:30px;">Entrada</strong>
            <p style="font-size:30px;">Fecha: 05/08/2014</p>
            <p style="font-size:25px;">Hora: 09:59:48</p>
            <p>Ubicación: 120B</p>
            <p>Placa: EPR87D</p>
            <p>Tipo De Vehiculo: Motocicleta</p>
            <p>Atendio : Martin</p>

        </div>
        <div class="codigo">
            <p>GRACIAS Y CONDUCE CON SEGURIDAD</p>
            <svg id="barcode"></svg>
            <p style="text-align:justify;">El parqueadero no responde por objetos no inventariados debidamente en porteria, tampoco respondemos por eventos extremos o fortuitos como terremoto, asonada, terrorismo, etc. Debe conservar este tiquete para la entrega de su vehiculo, si pierde el tiquete deberá presentar la tarjeta de propiedad y copia de la cedula de la persona que retira el vehiculo</p>
        </div>
    </div>
</body>
<script src="../../js/jquery.min.js"></script>
<script src="js/JsBarcode.all.min.js"></script>
<script>
    $(document).ready(function() {
        $("#barcode").JsBarcode("")
    })
    JsBarcode("#barcode", "15-025012", {
        format: "pharmacode",
        lineColor: "#0aa",
        width: 4,
        height: 40,
        displayValue: false
    });
    // or with jQuery
    $("#barcode").JsBarcode("15-025012");

</script>
<style>
    body {
        width: 345px;
        margin: auto;
        box-shadow: 0px 0px 0px 5px rgba(0,0,0,0.5);

    }

    .parte1 {
        border-top-style: dotted;
        border-bottom-style: dotted;
    }

    .contenedor {
        text-align: center;
    }

</style>

</html>
