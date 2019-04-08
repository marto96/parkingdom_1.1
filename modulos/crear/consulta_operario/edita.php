<?php
include "../../../seguridad/seguridad.php";
//include "../../../conexion/conexion.php";
?>
<?php

    $placa = $_GET['placa'];
    $doc = $_GET['num_documento'];

$conexion = new mysqli('localhost','root','','parkingdom');
    //
//}catch(PDOException $e){
//    echo "Error: " . $e->getMessage();
//}
if($conexion->connect_errno){
    
 $respuesta = [
     'error' => true
 ];   
}else{
    $conexion->set_charset("utf8");
$statement= $conexion->prepare("SELECT a . * , b . * 
FROM persona AS a JOIN vehiculo_persona AS c ON c.num_documento_vp = a.num_documento
JOIN vehiculos AS b ON b.placa_vehi = c.placa_vp WHERE b.placa_vehi='$placa' and a.num_documento='$doc'");

$statement->execute();

$resultados = $statement->get_result();

$respuesta=[];
    
while($fila = $resultados->fetch_assoc()){
    $persona = [
        
        'tipo_usuario'  => $fila['tipo_ususario'],
        'usuario'   => $fila['usuario'],
        'nombre'          => $fila['nombre'],
        'apellido'        => $fila['apellido'],
        'direccion'       => $fila['direccion'],
        'telefono'        => $fila['telefono'],
        'correo'          => $fila['correo'],
        'observaciones'   => $fila['observaciones'],
        
        'tipo_vehiculo'   => $fila['tipo_vehiculo'],
        'placa'           => $fila['placa_vehi'],
        'color'           => $fila['color'],
        'marca'           => $fila['marca'],
        'modelo'          => $fila['modelo'],
        
    ];
}
}

    
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Crear Cliente</title>
	<link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="error_box" id="error_box">
		<p>Se ha producido un error.</p>
	</div>
	<div class="correcto_box" id="correcto_box">
		<p>Transaccion Exitosa</p>
	</div>
	<div class="loginbox">


		<h1>Registrar Operario</h1><br>

		<form method="post" id="formulario" class="formulario">
			<div class="bloque">
				<p>Nombre <span>*</span> </p>
				<input type="text" placeholder="Nombre" name="nombre" id="nombres" class="placa" required>
			</div>
			<div class="bloque">

				<p>Apellidos<span>*</span></p>
				<input type="text" required autocomplete="off" placeholder="Apellido" id="apellidos" name="apellidos" />
			</div>

			<p>Correo Electronico<span>*</span></p>
			<input type="email" required autocomplete="off" id="correo" name="correo" placeholder="Digite Correo" />
			<div class="bloque">
				<p>Tipo de Usuario <span>*</span> </p>
				<select name="tipousuario" id="tipo" class="tipousuario" required>
					<option value="">Seleccione</option>
					<option value="administrador">Administrador</option>
					<option value="operario">Operario</option>
				</select>
			</div>
			<div class="bloque">
				<p>Usuario<span>*</span></p>
				<input type="text" required id="usuario" autocomplete="off" name="usuario" placeholder="Digite Usuario" />
			</div>
			<p>Contraseña<span class="req">*</span></p>
			<input type="password" required autocomplete="off" name="contraseña" id="contra" class="contra" placeholder="Digite Contraseña" />

			<p>
				Confirmar Contraseña<span class="req">*</span>
			</p>
			<input type="password" required autocomplete="off" name="confirmar_contraseña" placeholder="Repita Contraseña" id="contra1" class="contra1" />
			<div class="error_box" id="error_box">
				<p>Las contraseñas no coinciden,Verifique por favor.</p>
			</div>
			<input class="button button-block" value="Cancelar" type="button" />
			<input id="enviar" type="submit" class="button button-block" value="Registrar" />

		</form>

	</div>
	<script>
		var input3 = document.getElementById("contra1");

		input3.addEventListener('focusout', function() {
			var input1 = document.getElementById("contra").value;
			var input2 = document.getElementById("contra1").value;

			if (input1 != input2) {
				error_box.classList.add('active');
				return false;

			} else {
				error_box.classList.remove('active');
				return true;

			}
		});

	</script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="js/index.js"></script>

</body>

</html>
