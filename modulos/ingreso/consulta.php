<?php
include "../../seguridad/seguridad.php";
include "../../conexion/conexion.php";

try{
    //$conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom',array( PDO::ATTR_EMULATE_PREPARES=>false,
//    PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
  //  PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
//));

    date_default_timezone_set("America/Bogota");
	$placa=$_POST['placa'];
    //$placa="epr8d";
		$fecha_actual=date("Y-m-d H:i:s");  
		$usuario=$_SESSION['usuario'];
		$espacio= 10;
        $statement = $conexion->prepare("SELECT a . * , b.ubicacion
		FROM vehiculos AS a
		LEFT JOIN vehiculo_ubicacion AS b ON a.placa_vehi = b.placa
		WHERE placa_vehi =  '$placa'");
        $statement->execute();
        $resultados = $statement->fetch();
	
        $envio = array();
        if($resultados==TRUE){
           $tipo_cliente = 'mensual'; 
			$envio["cliente"] = $tipo_cliente;
			$envio["lugar"] = $resultados['ubicacion'];
			$envio["tipo_vehiculo"] = $resultados['tipo_vehiculo'];
			
           //echo 'mensual';
        }else{
         $tipo_cliente= 'temporal'; 
         $envio["cliente"] = $tipo_cliente;

        }
	echo json_encode($envio);
    //	echo $tipovehiculo;
	}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}




?>
