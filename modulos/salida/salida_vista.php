<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SALIDA</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">

</head>

<body>
	<div class="loginbox">
		<form action="salida.php" method="post" class="formulario">

			<p>Placa <span>*</span> </p>
			<input type="text" placeholder="Digite Placa" id="placa" name="placa" required> <input id="verificar" type="submit" value="Buscar">
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<br>
			<div id="bloque">
				<div class="bloque">
					<input type="text" name="id" id="id" style="display:none;">
					<p>Fecha Entrada <span>*</span> </p>
					<input type="text" name="hora_entrada" id="hora_entrada" disabled>
				</div>
				<div class="bloque">

					<p>Fecha Salida <span>*</span> </p>
					<input type="text" name="hora_salida" id="hora_salida" disabled>
				</div>
				<div class="bloque">

					<p>Tiempo Parqueo <span>*</span> </p>
					<input type="text" name="tiempo_parqueo" id="tiempo_parqueo" disabled>
				</div>
				<div class="bloque">

					<p>Valor Tiempo <span>*</span> </p>
					<input type="text" name="valor_tiempo" id="valor_tiempo" disabled>
				</div>
				<br>
				<input type="submit" value="Enviar" id="enviar">
				<input type="button" value="Cancelar" id="cancelar">
			</div>
		</form>
	</div>
	<script src="js/salida.js"></script>
</body>

</html>
