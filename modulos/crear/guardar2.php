<?php
include "seguridad/seguridad.php";
?>
<?php
$conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');
	// datos operario
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$password = $_POST['contraseña'];

    $consulta = $conexion->prepare("INSERT INTO `usuario`(`usuario`, `password`, `nombre`, `apellidos`, `correo`) VALUES ( :usuario, :password, :nombres, :apellidos, :correo_electronico)");
	$consulta->bindParam(':nombres',$nombres);
	$consulta->bindParam(':apellidos',$apellidos);
	$consulta->bindParam(':correo_electronico',$correo);
	$consulta->bindParam(':usuario',$usuario);
	$consulta->bindParam(':password',$password);
	
	// ejecutar la consulta

	if($consulta->execute()){
		 ?>
<script>
    alert('Usuario Creado con exito');
    window.location.href = 'crear_operario.php';

</script>
<?php    
    }else {
           ?>
<script>
    alert('Error, verifique por favor');
    window.location.href = 'crear_operario.php';

</script>
<?php   
        }
?>
