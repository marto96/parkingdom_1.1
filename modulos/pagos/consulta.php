<?php
include "../../seguridad/seguridad.php";
include "../../conexion/conexion.php";
try{
    //$conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom',array( PDO::ATTR_EMULATE_PREPARES=>false,
    //PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
    //PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
//));

    date_default_timezone_set("America/Bogota");
//$tipovehiculo="Automovil";

    $placa=$_POST['placa'];
    //$placa="epr987";

        $statement = $conexion->prepare("SELECT *
FROM vehiculos WHERE placa_vehi =  '$placa'");
        $statement->execute();
        $resultados = $statement->fetch();
	
        if($resultados==TRUE){
			if($resultados['tipo_vehiculo'] == "automovil"){
				$tarifa = '70000';
			}else if($resultados['tipo_vehiculo'] == "motocicleta"){
				$tarifa = '40000';
			}
			echo $tarifa;
           //echo 'mensual';
        }else{
         $error= 'error'; 
           echo 'error';
        }
    //	echo $tipovehiculo;
	}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}




?>
