<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Consulta Cliente</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
</head>

<body>
	<div class="contenedor">
		<header>
			<h1>Consulta Cliente</h1>
       <div>
				<button id="btn_cargar_clientes" class="btn active">Cargar Registros</button>
			</div>
        </header>
		<main>
			<form id="formulario" class="formulario" action="../crear_cliente.php">
				<button type="submit" class="btn">Agregar</button>
			</form>
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<div class="table-box">
				<table id="tabla" class="tabla" cellpadding="10">

					<tr>
						<th>Tipo Documento</th>
						<th>Numero Documento</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Direccion</th>
						<th>Correo</th>
						<th>Obsevaciones</th>
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
				<input type="text" name="tipo_documento" id="tipo_documento" placeholder="Tipo Documento" style="display:none;">
				<input type="text" name="num_documento" id="num_documento" placeholder="Numero Documento" style="display:none;">
				<input type="text" name="nombre" id="nombre" placeholder="Nombre"><br /><br />
				<input type="text" name="apellido" id="apellido" placeholder="Apellido"><br /><br />
				<input type="date" name="direccion" id="direccion" placeholder="Direccion"><br /><br />
				<input type="date" name="telefono" id="telefono" placeholder="Telefono"><br /><br />
				<input type="date" name="observaciones" id="observaciones" placeholder="Observaciones"><br /><br />
				<input id="botonWindowClose" type="button" onclick="_enviarAlPadre()" value="Cancelar">
				<input type="submit" value="Cambiar" id="cambiar"/>
			</form>

		</div>

	</div>
	<div id="myModal1" class="modal cuad2">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
			<span class="close">&times;</span></div>
			<form action="" method="" id="formulario_eliminar" class="formulario_eliminar">
			<input type="text" name="num_documento" id="num_documento" placeholder="Numero Documento" style="display:none;">
			<input type="text" name="placa" id="placa_eliminar" style="display:none;" placeholder="Placa">				
			<p>¿Esta seguro de eliminar el registro de la placa?</p>
			<input id="botonWindowClose" type="button" onclick="_enviarAlPadre()" value="Cancelar">
			<input type="submit" value="Eliminar" id="eliminar"/>
</form>
		</div>

	</div>

	<script src="../../../js/jquery-3.3.1.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
