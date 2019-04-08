<?php

//include "../../conexion/conexion.php";
error_reporting(0);
header('Content-type: application/json; charset=utf-8');
//try{
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
$statement= $conexion->prepare("SELECT a . * , b . * , c . * 
FROM persona AS a
JOIN vehiculo_persona AS c ON c.num_documento_vp = a.num_documento
JOIN vehiculos AS b ON b.placa_vehi = c.placa_vp");

$statement->execute();

$resultados = $statement->get_result();
//print_r $resultados;
    
$respuesta = [];
    
while($fila = $resultados->fetch_assoc()){
    $persona = [
        
        'num_documento'  => $fila['num_documento'],
        'nombre'         => $fila['nombre'],
        'apellido'       => $fila['apellido'],
        'direccion'      => $fila['direccion'],
        'telefono'       => $fila['telefono'],
        'placa'          => $fila['placa_vehi']
    ];
    array_push($respuesta, $persona
              );
}
}

echo json_encode($respuesta);
