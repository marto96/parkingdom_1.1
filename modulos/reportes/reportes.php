<?php
//include "../../seguridad/seguridad.php";
?>
<?php
try{
    $conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

$consulta= $conexion->prepare("SELECT * FROM transaccion");

$consulta->execute();

if($consulta->rowCount()>=1){
while($fila=$consulta->fetch()){
      echo"<tr>
				<td>".$fila['id_transaccion']."</td>
				<td>".$fila['tipo_vehiculo']."</td>
				<td>".$fila['placa']."</td>
				<td>".$fila['hora_entrada']."</td>
				<td>".$fila['hora_salida']."</td>
				<td>".$fila['tiempo_parqueo']."</td>
				<td>".$fila['valor_tiempo']."</td>
				<td>".$fila['usuario']."</td>
		</tr>";
}
    
  
}else{
    
}