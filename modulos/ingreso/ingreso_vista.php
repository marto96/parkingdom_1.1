<?php
include "../../seguridad/seguridad.php";
//session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INGRESO</title>
	<link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">

	<link rel="stylesheet" href="css/estilos.css">
</head>

<body>
	<div class="error_box" id="error_box">
		<p>Se ha producido un error.</p>
	</div>
	<div class="correcto_box" id="correcto_box">
		<p>Transaccion Exitosa</p>
	</div>
	<div class="loginbox">

		<form method="post" id="formulario" class="formulario">
			<p>Placa <span>*</span> </p>
			<input type="text" placeholder="Digite Placa" name="placa" id="placa" class="placa" min="5" maxlength="6" required>
			<br>
			<p>Tipo de Vehiculo <span>*</span> </p>
			<select name="tipovehiculo" id="tipovehiculo" class="tipovehiculo" required>
				<option value="Seleccione">Seleccione</option>
				<option value="Automovil">Automovil</option>
				<option value="motocicleta">motocicleta</option>
			</select>
			<br>
			<div id="ubicacion_auto" class="boton">Seleccione Ubicación</div>
			<div id="ubicacion_moto" class="boton">Seleccione Ubicación</div>
			<p id="labl">Ubicación <span>*</span> </p>
			<input type="text" id="n_ubicacion" placeholder="N° Ubicación" name="ubicacion" disabled required>
			<br>
			<input id="botonWindowClose" type="button" onclick="_enviarAlPadre()" value="Cancelar">
			<input type="submit" value="Enviar" id="enviop">
		</form>
	</div>
	<iframe class="iframe" id="iframe" src="../impresiones/cupos.php" frameborder="0"></iframe>
	<iframe class="iframe" id="iframem" src="../impresiones/cuposm.php" frameborder="0"></iframe>
</body>
<script src="js/entrada.js"></script>
<script>
	function _ocultarIframe() {
		document.getElementById("iframe").contentWindow.location.reload(true);
		document.getElementById('iframe').style.display = 'none'
	}

</script>

</html>
