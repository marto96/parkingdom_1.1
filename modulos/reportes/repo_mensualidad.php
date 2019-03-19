<?php 
try{
    $conexion= new PDO('mysql:host=localhost;dbname=parkingdom','root','');
    }
catch(PDOException $e){
      echo "Error:" . $e->getMessage();
}
                $por_tipo=$_POST['tipo_cliente'];
                $reporte=$_POST['reporte'];
?>
<script>
    var variable='<?php echo$reporte;?>';
 
document.write(variable);
console.log(variable);</script>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>
   <!--REPORTE MENSUALIDAD-->
    <div id="main-container">
        <table>
            <thead>
                <tr>
                    <th>NUMERO DE DOCUMENTO</th>
                    <th>PLACA</th>
                    <th>FECHA DE INICIO</th>
                    <th>FECHA DE FIN</th>
                    <th>ESTADO DE LA MENSUALIDAD</th>
                </tr>
                <!--CONSULTA POR PLACA-->
                <?php
                $por_placa=$_POST['placa'];
                $consulta= $conexion->prepare("SELECT num_documento_vp,placa_vp,fecha_inicio,fecha_fin,estado from vehiculo_persona INNER JOIN mensualidad on vehiculo_persona.placa_vp=mensualidad.placa where placa_vp='$por_placa'");
                $consulta->execute();
                if($consulta->rowCount()>=1){
                    while($fila=$consulta->fetch()){
                echo"
                <tr>
				    <td>".$fila['num_documento_vp']."</td>
				    <td>".$fila['placa_vp']."</td>
				    <td>".$fila['fecha_inicio']."</td>
				    <td>".$fila['fecha_fin']."</td>
				    <td>".$fila['estado']."</td>
		          </tr>";
                    }     
                }
              ?>
              <!--CONSULTA POR NUMERO DE DOCUMENTO-->
              <?php
                $por_cedula=$_POST['num_documento'];
                $consulta1= $conexion->prepare("SELECT num_documento_vp,placa_vp,fecha_inicio,fecha_fin,estado from vehiculo_persona INNER JOIN mensualidad on vehiculo_persona.placa_vp=mensualidad.placa where num_documento_vp='$por_cedula'");
                $consulta1->execute();
                if($consulta1->rowCount()>=1){
                    while($fila1=$consulta1->fetch()){
                echo"
                <tr>
				    <td>".$fila1['num_documento_vp']."</td>
				    <td>".$fila1['placa_vp']."</td>
				    <td>".$fila1['fecha_inicio']."</td>
				    <td>".$fila1['fecha_fin']."</td>
				    <td>".$fila1['estado']."</td>
		          </tr>";
                    }     
                }
              ?>
              <!--CONSULTA POR FECHAS-->
              <?php
                $por_fecha_inicio=$_POST['fecha_ingreso'];
                $por_fecha_fin=$_POST['fecha_salida'];
                $consulta2= $conexion->prepare("SELECT num_documento_vp,placa_vp,fecha_inicio,fecha_fin,estado from vehiculo_persona INNER JOIN mensualidad on vehiculo_persona.placa_vp=mensualidad.placa where fecha_inicio='$por_fecha_inicio' AND fecha_fin='$por_fecha_fin'");
                $consulta2->execute();
                if($consulta2->rowCount()>=1){
                    while($fila2=$consulta2->fetch()){
                echo"
                <tr>
				    <td>".$fila2['num_documento_vp']."</td>
				    <td>".$fila2['placa_vp']."</td>
				    <td>".$fila2['fecha_inicio']."</td>
				    <td>".$fila2['fecha_fin']."</td>
				    <td>".$fila2['estado']."</td>
		          </tr>";
                    }     
                }
              ?>
            </thead>
        </table>
    </div>
    
    <!--REPORTE TRANSACCION-->
    <div id="main-container">
        <table>
            <thead>
                <tr>
                    <th>PLACA</th>
                    <th>TIPO DEL VEHICULO</th>
                    <th>FECHA Y HORA DE INICIO</th>
                    <th>FECHA Y HORA DE FIN</th>
                    <th>TIPO DEL CLIENTE</th>
                    <th>OPERARIO REGISTRADOR</th>
                </tr>
                <!--CONSULTA POR PLACA-->
                <?php
                $por_placa_tr=$_POST['placa'];
                $consulta_tr= $conexion->prepare("SELECT placa, tipo_vehiculo, hora_entrada, hora_salida, tipo_cliente, usuario
FROM transaccion WHERE placa='por_placa_tr'");
                $consulta_tr->execute();
                if($consulta_tr->rowCount()>=1){
                    while($fila_tr=$consulta_tr->fetch()){
                echo"
                <tr>
				    <td>".$fila_tr['placa']."</td>
				    <td>".$fila_tr['tipo_vehiculo']."</td>
				    <td>".$fila_tr['hora_entrada']."</td>
				    <td>".$fila_tr['hora_salida']."</td>
				    <td>".$fila_tr['tipo_cliente']."</td>
                    <td>".$fila_tr['usuario']."</td>
		          </tr>";
                    }     
                }
              ?>
              
              <!--CONSULTA POR TIPO DE CLIENTE-->
                <?php
                $por_tipo=$_POST['tipo_cliente'];
                $consulta_tr2= $conexion->prepare("SELECT placa, tipo_vehiculo, hora_entrada, hora_salida, tipo_cliente, usuario
FROM transaccion WHERE placa='por_placa_tr'");
                $consulta_tr2->execute();
                if($consulta_tr2->rowCount()>=1){
                    while($fila_tr2=$consulta_tr2->fetch()){
                echo"
                <tr>
				    <td>".$fila_tr2['placa']."</td>
				    <td>".$fila_tr2['tipo_vehiculo']."</td>
				    <td>".$fila_tr2['hora_entrada']."</td>
				    <td>".$fila_tr2['hora_salida']."</td>
				    <td>".$fila_tr2['tipo_cliente']."</td>
                    <td>".$fila_tr2['usuario']."</td>
		          </tr>";
                    }     
                }
              ?>
            </thead>
        </table>
    </div>    
</body>

</html>
