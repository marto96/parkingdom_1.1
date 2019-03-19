<?php 

	 $conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');

 ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALIDA</title>
    <link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">
    <link rel="stylesheet" href="css/estilos2.css">


</head>

<body>


    <div class="loginbox">
        <form action="../impresion/impresion_salida.php" class="formulario">
            <table border="1">
                <tbody>
                    <?php 
              session_start();
               $placa = $_SESSION['placa']; 
		       $statement = $conexion->prepare("SELECT * FROM transaccion where placa ='$placa'");
               $statement->execute();
               $resultados = $statement->fetch();
                    
               ?>
                    <tr>
                        <td>Tipo de Vehículo</td>
                        <td><label>
                                <?php echo $resultados['tipo_vehiculo'] ?> </label></td>
                    </tr>
                    <tr>
                        <td>Placa</td>
                        <td><label>
                                <?php echo $resultados['placa'] ?></label></td>
                    </tr>
                    <tr>
                        <td>Hora de Entrada</td>
                        <td><label>
                                <?php echo $resultados['hora_entrada'] ?></label></td>
                    </tr>
                    <tr>
                        <td>Hora de salida</td>
                        <td><label>
                                <?php echo $resultados['hora_salida'] ?></label></td>
                    </tr>
                    <tr>
                        <td>Tiempo de parqueo</td>
                        <td><label>
                                <?php echo $resultados['tiempo_parqueo'] ?></label></td>
                    </tr>
                    <?php 
              if($resultados['tipo_cliente'] == "temporal"){    
               ?>
                    <tr>
                        <td>Valor del tiempo </td>
                        <td><label>$
                                <?php echo $resultados['valor_tiempo'] ?> COP</label></td>
                    </tr>
                    <?php 
                            }

               ?>
                </tbody>
            </table>
            <?php
            echo "<a href='../impresiones/impresion_salida.php?resultados=".serialize($resultados)."'>ir a mipagina.php pasando como parametro un array</a>";
            ?>
            <input type="submit" value="Finalizar">
            <input type="submit" value="Imprimir Factura">


        </form>
    </div>
   

</body>

</html>
<?php
//require_once "../impresiones/impresion_salida.php";
?>