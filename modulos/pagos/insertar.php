<?php
include "../../seguridad/seguridad.php";

try{
    $conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');

   $placa = $_POST['placa'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$valor =  $_POST['valor_mes'];
$estado = 'activo';

        $statement = $conexion->prepare("INSERT INTO `parkingdom`.`mensualidad` (`placa`, `fecha_inicio`, `fecha_fin`, `valor_mensualidad`,`estado`) VALUES (:placa,:fecha_inicio,:fecha_fin,:valor,:estado);");
        $statement->bindParam(':placa', $placa);
        $statement->bindParam(':fecha_inicio', $fecha_inicio);
        $statement->bindParam(':fecha_fin', $fecha_fin);
        $statement->bindParam(':estado', $estado);
        $statement->bindParam(':valor', $valor);
    
    if($statement->execute()){
        $recibo = "correcto";
    }else {
           $recibo = "incorrecto";

        }
        echo $recibo;
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}




?>
