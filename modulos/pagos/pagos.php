<?php
//include "seguridad/seguridad.php";
?>
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
$statement= $conexion->prepare("SELECT * FROM mensualidad");

$statement->execute();

$resultados = $statement->get_result();
//echo $resultados;
    
$respuesta = [];
    
while($fila = $resultados->fetch_assoc()){
    $usuario = [
        'id'            => $fila['id_mensualidad'],
        'Placa'         => $fila['placa'],
        'Fecha_Inicio'  => $fila['fecha_inicio'],
        'Fecha_Fin'     => $fila['fecha_fin'],
        'Estado'        => $fila['estado'],
        'Valor_Mes'     => $fila['valor_mensualidad']
    ];
    array_push($respuesta, $usuario);
}
}

echo json_encode($respuesta);
