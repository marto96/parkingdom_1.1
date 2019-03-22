<?php
include "../../seguridad/seguridad.php";
include "../../conexion/conexion.php";

try{
   
	if (isset($_POST['id'])) {
     
if (!empty($_POST['id'])) {
        $statement = $conexion->prepare("DELETE FROM `mensualidad` WHERE `id_mensualidad`= :id");
        $statement->bindParam(':id', $_POST['id']);
	
}
	}
    
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
