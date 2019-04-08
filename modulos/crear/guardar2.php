<?php
include "../../seguridad/seguridad.php";
include "../../conexion/conexion.php";

//$conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom');
	// datos operario
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$tipo = $_POST['tipo'];
	$usuario = $_POST['usuario'];
	$password = sha1($_POST['contra']);

    $consulta = $conexion->prepare("INSERT INTO `usuario`(`usuario`, `tipo`, `password`, `nombre`, `apellidos`, `correo`) VALUES ( :usuario,:tipo, :password, :nombres, :apellidos, :correo_electronico)");
	$consulta->bindParam(':nombres',$nombres);
	$consulta->bindParam(':apellidos',$apellidos);
	$consulta->bindParam(':correo_electronico',$correo);
	$consulta->bindParam(':usuario',$usuario);
	$consulta->bindParam(':tipo',$tipo);
	$consulta->bindParam(':password',$password);
	
	// ejecutar la consulta

	if($consulta->execute()){
		echo "funciona";
    }else {
        		echo "nofunciona";

                }
?>
