<?php
include "../../seguridad/seguridad.php";

?>
<?php
try{
    $conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','',array( PDO::ATTR_EMULATE_PREPARES=>false,
    PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
));

    date_default_timezone_set("America/Bogota");
$tipovehiculo=$_POST['tipovehiculo'];
//$tipovehiculo="Automovil";

    $placa=$_POST['placa'];
    //$placa="epr987";
$fecha_actual=date("Y-m-d H:i:s");  
$usuario=$_SESSION['usuario'];
$espacio= $_POST['ubicacion'];
        $statement = $conexion->prepare("SELECT * FROM vehiculos where placa_vehi ='$placa'");
        $statement->execute();
        $resultados = $statement->fetch();
        if($tipovehiculo == 'Automovil'){
          $tp1= 2;
        }else if($tipovehiculo == 'motocicleta'){
          $tp1= 1;
        }
        if($resultados==TRUE){
           $tipo_cliente = 'mensual'; 
           //echo 'mensual';
        }else{
         $tipo_cliente= 'temporal'; 
            //echo 'temporal';
        }
    //echo $tipovehiculo;
    $statement1 = $conexion->prepare("SELECT * FROM transaccion where placa ='$placa' and hora_salida is NULL");
        $statement1->execute();
        $resultados1 = $statement1->fetch();
    if($resultados1 == TRUE){
        $retorno = "retorno";
        echo $retorno;
            
    }else{
        
         $sentencia=$conexion->prepare("INSERT INTO `parkingdom`.`transaccion` (`placa`, `tipo_vehiculo`, `hora_entrada`, `hora_salida`, `tiempo_parqueo`, `valor_tiempo`, `tipo_cliente`, `usuario`,`tarifa_tr`, `espacio_tr`) VALUES ( :placa, :tipo_vehiculo, :hora_entrada, NULL, NULL, NULL, :tipo_cliente, :usuario,:tarifa, :espacio);");
       
        $sentencia->bindParam(':tipo_vehiculo',$tipovehiculo);
        $sentencia->bindParam(':placa',$placa);
        $sentencia->bindParam(':hora_entrada',$fecha_actual);
        $sentencia->bindParam(':tarifa',$tp1);
        $sentencia->bindParam(':usuario',$usuario);
        $sentencia->bindParam(':tipo_cliente',$tipo_cliente);
        $sentencia->bindParam(':espacio',$espacio);
    
    
    if($sentencia->execute()){
        $respuesta = "correcto";
    }else {
           $respuesta = "incorrecto";

        }
        echo $respuesta;
}
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}




?>
