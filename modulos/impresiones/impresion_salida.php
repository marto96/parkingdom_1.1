<?php
$resultados=unserialize($_GET["resultados"]);
 
echo "<pre>";
//print_r($resultados);
//print_r($resultados['id_transaccion']);
echo "</pre>";
?>
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
        <div class="parte1">
            <p>Avenida de la libertad, 12 - 280001 - Bogota Colombia</p>
            <p>TICKET <?php print_r($resultados['id_transaccion']);?></p>
            <p style="font-size:30px;">Valor: <?php print_r($resultados['valor_tiempo']);?></p>
            <p style="font-size:30px;">Fecha Ingreso: <?php print_r($resultados['hora_entrada']);?></p>
            <p style="font-size:30px;">Fecha Salida: <?php print_r($resultados['hora_salida']);?></p>
            <p>Tiempo Parqueo: <?php print_r($resultados['tiempo_parqueo']);?></p>
            <p>Ubicación: 120B</p>
            <p>Placa: <?php print_r($resultados['placa']);?></p>
            <p>Tipo De Vehiculo: <?php print_r($resultados['tipo_vehiculo']);?></p>

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
    JsBarcode("#barcode", "<?php print_r($resultados['id_transaccion']);?>", {
        format: "pharmacode",
        lineColor: "#0aa",
        width: 4,
        height: 40,
        displayValue: false
    });
    // or with jQuery
    $("#barcode").JsBarcode("<?php  print_r($resultados['id_transaccion']);?>");

</script>
<style>
    body {
        width: 25%;
        margin: auto;
        box-shadow: 0px 0px 0px 5px rgba(0,0,0,0.5);
        background: white;

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
