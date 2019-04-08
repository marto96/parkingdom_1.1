<?php
include "../../seguridad/seguridad.php";
include "../../conexion/conexion.php";
try{
   // $conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');

$num_Documento = $_POST["num_documento"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion =  $_POST["direccion"];
$telefono =  $_POST["telefono"];
$correo =  $_POST["correo"];
$observaciones =  $_POST["observaciones"];
$estado = "activo";
	if (isset($_POST['id'])) {
     
if (!empty($_POST['num_documento'])) {
        $statement = $conexion->prepare("UPDATE `persona` SET `nombre`=:nombre,`apellido`=:apellido,`direccion`=:direccion,`telefono`=:telefono,`correo`=:correo WHERE `num_documento`= :num_documento");
        $statement->bindParam(':num_documento', $_POST['num_documento']);
	
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
