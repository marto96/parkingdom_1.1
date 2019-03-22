<?php

include "../../conexion/conexion.php";
try{
    
//	error_reporting(0);

	//header('Content-type: application/json; charset=utf-8');
    //$conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom');

	date_default_timezone_set("America/Bogota");
	$placa=$_POST['placa'];
//$placa='uhb654';
	$fecha_actual= date("Y-m-d H:i:s");
    // consulta para validar existencia del registro
	$statement = $conexion->prepare("SELECT * FROM transaccion where placa ='$placa' and hora_salida is null"); 
	$statement->execute();
    if($statement->rowCount()>=1){
		
        while($fila=$statement->fetch()){
            $id = $fila['id_transaccion']; 
            $hora = $fila['hora_entrada'];
            $tipo_ve = $fila['tipo_vehiculo'];
    
     //Sacar diferencia de las horas "tiempo de parqueo". 
        
        $fecha1 = new DateTime ("$hora");
        $fecha2 = new DateTime ("$fecha_actual");
        $fecha  = $fecha1->diff ($fecha2);
        $tiempo = $fecha->format('%a dias %h hrs %i minutos %S segundos');
        // Hallar el valor del tiempo en pesos $    .
        $totalminutos = ($fecha->y * 525600)+($fecha->m * 43800)+($fecha->d * 1440)+($fecha->h * 60)+($fecha->i * 1)+ ($fecha->s * 0.0166667);
        $c1 = round($totalminutos);
        $tarifa= 60;
   		if($c1 > 1440){
	    	$valorh = $c1/1440;
	    	$c2 = round($valorh);
	    	$calculo = $c2-$valorh; 
	    	$valorm = $calculo*1440;
	    if($tipo_ve == "Automovil"){
   			$valor_tiempoh = $c2 * 30000;
   			$valor_tiempom = $valorm * $tarifa;
		    $total = $valor_tiempoh + $valor_tiempom;
	   	}else if($tipo_ve == "motocicleta"){
		    $valor_tiempoh = $c2 * 7000;
		   	$valor_tiempom = $valorm * $tarifa;
		    $total = $valor_tiempoh + $valor_tiempom;
	    }
        	$valor_tiempo1 = round($total);
   }else{
        	$valor_tiempo = $c1 * $tarifa;
        	$valor_tiempo1 = round($valor_tiempo);
     	}
         $devolucion = array();
		 $devolucion["id"] = $id;
		 $devolucion["valor_tiempo"] = $valor_tiempo1;
		 $devolucion["tiempo_total"] = $tiempo;
		 $devolucion["fecha_inicial"] = $fecha1;
		 $devolucion["fecha_final"] = $fecha2;
		echo json_encode($devolucion);
		}
       }else{
		$respuesta = [
     'error' => true
 ];  
		echo json_encode($respuesta); 
	}

}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}




?>
