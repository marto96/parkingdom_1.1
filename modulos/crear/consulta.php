<?php
include "../../seguridad/seguridad.php";
include "../../conexion/conexion.php";

//$conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom');
	// datos operario

if(!empty($_POST['correo'])){	
$correo = $_POST['correo'];
	$where = "correo='$correo'";
}
if(!empty($_POST['usuario'])){
	$usuario = $_POST['usuario'];
	$where = "usuario='$usuario'";
}
      $statement = $conexion->prepare("SELECT * FROM usuario
		WHERE ".$where);
        $statement->execute();
        $resultados = $statement->fetch();
	
        if($resultados==TRUE){
           $res = 'existe'; 
           //echo 'mensual';
        }else{
         $res= 'sigue'; 

        }
echo $res;
	
	// ejecutar la consulta
?>
