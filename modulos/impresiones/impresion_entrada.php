<?php
include "../../seguridad/seguridad.php";
 date_default_timezone_set("America/Bogota");
	
$placa = $_GET["placa"];
$tipo = $_GET["tipovehiculo"];
$ubicacion = $_GET["ubicacion"];
$time = date('H:i:s');
$fecha = date("d-m-Y");
$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Entrada</title>  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

    <div class="contenedor">
        <img src="../../imagenes/logoimp.svg" alt="Parkingdom" style="width:200px;">
       
            <p> Cl. 52 a Sur # 77 h 24, Bogotá - Colombia</p>
             <div class="parte1">
            <strong  style="font-size:30px;">Entrada</strong>
            <p>Fecha: <?php echo $fecha?></p>
            <p>Hora:<?php echo $time?></p>
            <p>Ubicación: <?php echo $ubicacion?></p>
            <p>Placa: <?php echo $placa; ?></p>
            <p>Tipo De Vehiculo: <?php echo $tipo; ?></p>
            <p>Atendio : <?php echo $usuario; ?></p>

        </div>
        <div class="codigo">
            <p>GRACIAS Y CONDUCE CON SEGURIDAD</p>
            <p style="text-align:justify;">El parqueadero no responde por objetos no inventariados debidamente en porteria, tampoco respondemos por eventos extremos o fortuitos como terremoto, asonada, terrorismo, etc. Debe conservar este tiquete para la entrega de su vehiculo, si pierde el tiquete deberá presentar la tarjeta de propiedad y copia de la cedula de la persona que retira el vehiculo</p>
        </div>
    </div>
    <button onclick="window.print();"> <i class="material-icons">print</i> Imprimir</button>
    <button onclick="window.close();"> <i class="material-icons">close</i> Cancelar</button>
</body>
<script src="../../js/jquery.min.js"></script>
<script src="js/JsBarcode.all.min.js"></script>
<script>
	
   window.onload=function() {

		window.print();
       };
  

</script>
<style>
    body {
        width: 345px;
        margin: auto;
        background: #fff;
    }

    .parte1 {
        border-top-style: dotted;
        border-bottom-style: dotted;
    	font-size: 25px;
		
	}
	.parte1 p{
		margin: 10px auto;
    	margin-left: 60px;
		text-align: left;
	}

    .contenedor {
        text-align: center;
    }

</style>

</html>
