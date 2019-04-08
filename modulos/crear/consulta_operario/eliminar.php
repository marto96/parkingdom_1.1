<?php
include "../../../seguridad/seguridad.php";
include "../../../conexion/conexion.php";

try{
   
	if (isset($_POST['num_documento'])) {
     
if (!empty($_POST['num_documento'])) {
$statement = $conexion->prepare("DELETE FROM persona AS a
JOIN vehiculo_persona AS c ON c.num_documento_vp = a.num_documento
JOIN vehiculos AS b ON b.placa_vehi = c.placa_vp");
    
$statement->bindParam(':num_documento',$_POST['num_documento']);
	
}
	}
    
    if($statement->execute()){
        $num_documento = "correcto";
    }else {
           $num_documento = "incorrecto";

        }
        echo $num_documento;

}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
?>