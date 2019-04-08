<?php
include "../../../seguridad/seguridad.php";
//include "../../../conexion/conexion.php";
?>
<?php

    $placa = $_GET['placa'];
    $doc = $_GET['num_documento'];

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
$statement= $conexion->prepare("SELECT a . * , b . * 
FROM persona AS a JOIN vehiculo_persona AS c ON c.num_documento_vp = a.num_documento
JOIN vehiculos AS b ON b.placa_vehi = c.placa_vp WHERE b.placa_vehi='$placa' and a.num_documento='$doc'");

$statement->execute();

$resultados = $statement->get_result();

$respuesta=[];
    
while($fila = $resultados->fetch_assoc()){
    $persona = [
        
        'tipo_documento'  => $fila['tipo_documento'],
        'num_documento'   => $fila['num_documento'],
        'nombre'          => $fila['nombre'],
        'apellido'        => $fila['apellido'],
        'direccion'       => $fila['direccion'],
        'telefono'        => $fila['telefono'],
        'correo'          => $fila['correo'],
        'observaciones'   => $fila['observaciones'],
        
        'tipo_vehiculo'   => $fila['tipo_vehiculo'],
        'placa'           => $fila['placa_vehi'],
        'color'           => $fila['color'],
        'marca'           => $fila['marca'],
        'modelo'          => $fila['modelo'],
        
    ];
}
}

    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/style_cliente.css">
</head>

<body>

    <div class="contenedor">

        <form id="msform" method="post" action="guardar.php">

            <!-- progressbar -->

            <ul id="progressbar">
                <li class="active">Registrar Cliente</li>
                <li>Registrar Vehiculo</li>
                <li>Observaciones</li>
            </ul>

            <!-- fieldsets -->

            <!-- primer modulo -->

            <fieldset>
                <h2 class="fs-title">Datos Cliente</h2>

                <select name="tipo_documento" required  autocomplete="off">
                    <option value="0">Tipo de Documento</option>
                    <option value="CC">Cedula de Ciudadania</option>
                    <option value="CE">Cedula de Extranjeria</option>
                </select>
                <input type="number" name="numero_documento" placeholder="Numero Documento" required autocomplete="off" />
                <input type="text" name="nombres" placeholder="Nombres" required autocomplete="off" />
                <input type="text" name="apellidos" placeholder="Apellidos" required  autocomplete="off" />
                <input type="text" name="direccion" placeholder="Direccion" required autocomplete="off" />
                <input type="number" name="telefono" placeholder="Telefono" required autocomplete="off" />
                <input type="email" name="correo_electronico" placeholder="Correo Electronico" required autocomplete="off" />


                <input type="button" name="next" class="next action-button" value="Siguiente" />
            </fieldset>

            <!-- segundo modulo -->

            <fieldset>
                <h2 class="fs-title">Datos Vehiculo</h2>

                <select name="tipo_vehiculo">
                    <option value="0">Tipo de Vehiculo</option>
                    <option value="automovil">Automovil</option>
                    <option value="motocicleta">Motocicleta</option>
                </select>
                <input type="text" name="placa" placeholder="Placa" required  autocomplete="off" />
                <input type="text" name="color" placeholder="Color" required  autocomplete="off"/>
                <input type="text" name="modelo" placeholder="Modelo" required  autocomplete="off"/>
                <input type="text" name="marca" placeholder="Marca" required  autocomplete="off"/>
                <input type="button" name="previous" class="previous action-button" value="Anterior" />
                <input type="button" name="next" class="next action-button" value="Siguiente" />
            </fieldset>

            <!-- tercer modulo -->

            <fieldset>
                <h2 class="fs-title">Observaciones</h2>

                <input type="text" name="observaciones" placeholder="Observaciones" required autocomplete="off"/>
                <input type="button" name="previous" class="previous action-button" value="Anterior" />
                <button type="submit" class=" action-button" value="Enviar">Enviar</button>
            </fieldset>


        </form>

        <?php
    //datos clientes
     if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['numero_documento']) && isset($_POST['telefono']) && isset($_POST['correo_electronico'])
    //datos vehiculo
      && isset($_POST['placa']) && isset($_POST['color']) && isset($_POST['modelo']) && isset($_POST['marca']) 
    //datos observaciones
      && isset($_POST['observaciones'])){
       
         require_once '../../conexion/conexion.php';
         require_once 'guardar.php';
       }
?>

    </div>

</body>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="js/index2.js"></script>

</html>
