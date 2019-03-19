<?php
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
$statement= $conexion->prepare("SELECT * FROM transaccion where hora_salida is null");

$statement->execute();

$resultados = $statement->get_result();
//echo $resultados;
  
 $automov=0;
        $moto=0;
        $cautomov=50;
        $cmoto = 50;
while($fila = $resultados->fetch_assoc()){
   // $val=$resultado[$index];
      //      print_r($val);
      $respuesta= [];
    
        if($fila['tipo_vehiculo']=="Automovil"){
           // echo'siiii';
            $automov++;
            
            $cautomov = 50 - $automov;
            
        }
        if($fila['tipo_vehiculo']=="motocicleta"){
            $moto++;
            $cmoto = 50 - $moto;     }
    
   
    array_push($respuesta, $cmoto, $cautomov, $moto, $automov); 
}
}

echo json_encode($respuesta);
