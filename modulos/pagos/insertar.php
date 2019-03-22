<?php
include "../../seguridad/seguridad.php";
include "../../conexion/conexion.php";
try{
   // $conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');

   $placa = $_POST["placa"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$valor =  $_POST["valor_mes"];
$estado = "activo";
	if (isset($_POST['id'])) {
     
if (!empty($_POST['id'])) {
        $statement = $conexion->prepare("UPDATE `mensualidad` SET `placa`=:placa,`fecha_inicio`=:fecha_inicio,`fecha_fin`=:fecha_fin,`valor_mensualidad`=:valor,`estado`=:estado WHERE `id_mensualidad`= :id");
        $statement->bindParam(':id', $_POST['id']);
	
}
    }else{
        $statement = $conexion->prepare("INSERT INTO `mensualidad` (`placa`, `fecha_inicio`, `fecha_fin`, `valor_mensualidad`,`estado`) VALUES (:placa,:fecha_inicio,:fecha_fin,:valor,:estado)");
	}
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
