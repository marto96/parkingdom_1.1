<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro Mensualidad</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
</head>

<body>
	<div class="contenedor">
		<header>
			<h1>Registro Mensualidades</h1>
			<div>
				<button id="btn_cargar_usuarios" class="btn active">Cargar Registros</button>
			</div>
		</header>
		<main>
			<form id="formulario" class="formulario">
				<input type="text" name="placa" id="placa" placeholder="Placa">
				<input type="text" name="valor" id="valor" placeholder="Valor Mensualidad">
				<input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
				<input type="date" name="fecha_fin" id="fecha_fin" placeholder="Fecha Fin">
				<button type="submit" class="btn">Agregar</button>
			</form>
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<div class="table-box">
				<table id="tabla" class="tabla" cellpadding="10">

					<tr>
						<th>ID</th>
						<th>Placa</th>
						<th>Fecha Inicio</th>
						<th>Fecha Fin</th>
						<th>Estado</th>
						<th>Valor Mes</th>
						<th>Opciones</th>
					</tr>

				</table>
				<div class="loader" id="loader"></div>

			</div>
		</main>
	</div>

	<div id="myModal" class="modal cuad1">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
				<span class="close">&times;</span></div>
			<form action="" method="" id="formulario_editar" class="formulario_editar">
				<input type="text" name="placa" id="placa_editar" placeholder="Placa"><br /><br />
				<input type="text" name="valor" id="valor_editar" placeholder="Valor Mensualidad"><br /><br />
				<input type="date" name="fecha_inicio" id="fecha_inicio_editar" placeholder="Fecha Inicio"><br /><br />
				<input type="date" name="fecha_fin" id="fecha_fin_editar" placeholder="Fecha Fin"><br /><br />
				<input type="submit" value="Enviar">
				<input id="botonWindowClose" type="button" onclick="_enviarAlPadre()" value="Cancelar">
			</form>

		</div>

	</div>
	<div id="myModal1" class="modal cuad2">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
				<span class="close">&times;</span></div>
			<p>¿Esta seguro de eliminar el registro?</p>
			<input type="submit" value="Enviar">
			<input id="botonWindowClose" type="button" onclick="_enviarAlPadre()" value="Cancelar">

		</div>

	</div>

	<script src="../../js/jquery-2.1.3.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
