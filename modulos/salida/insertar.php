<?php

include "../../conexion/conexion.php";
try{
	//error_reporting(0);
header('Content-type: application/json; charset=utf-8');
    //$conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom');

date_default_timezone_set("America/Bogota");
$placa=$_POST['placa'];
$fecha_actual=$_POST['hora_salida'];
$valor_tiempo=$_POST['valor_tiempo'];
$tiempo=$_POST['tiempo_parqueo'];
$id=$_POST['id'];

     

    // consulta para validar existencia del registro
 $sentencia=$conexion->prepare("UPDATE transaccion SET hora_salida = '$fecha_actual',valor_tiempo = '$valor_tiempo',tiempo_parqueo = '$tiempo'  WHERE placa = '$placa' and id_transaccion = '$id'"); 
	if($sentencia ->execute()){
           
                   echo "realizado";
                   
                    }else{
                     echo "error";
                   }
    

}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}




?>
