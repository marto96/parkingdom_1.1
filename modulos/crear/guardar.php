<?php
$conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');

	// datos clientes
	$nombre = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$tipo_documento = $_POST['tipo_documento'];
	$numero_documento = $_POST['numero_documento'];
	$telefono = $_POST['telefono'];
	$correo_electronico = $_POST['correo_electronico'];
	// datos vehiculo
	$placa = $_POST['placa'];
	$tipo_vehiculo = $_POST['tipo_vehiculo'];
	$color = $_POST['color'];
	$modelo = $_POST['modelo'];
	$marca = $_POST['marca'];
	// datos de observaciones
	$observaciones = $_POST['observaciones'];


	$consulta = $conexion-> prepare("INSERT INTO `parkingdom`.`persona` (`num_documento`, `tipo_documento`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`, `observaciones`) VALUES ( :numero_documento, :tipo_documento, :nombre, :apellidos, :direccion, :correo_electronico, :telefono, :observaciones)");

	$consulta1 = $conexion-> prepare("INSERT INTO `vehiculos`(`placa_vehi`, `modelo`, `color`, `marca`, `tipo_vehiculo`) VALUES (:placa, :modelo, :color, :marca, :tipo_vehiculo)");

    $consulta2 = $conexion-> prepare("INSERT INTO `vehiculo_persona`(`num_documento_vp`, `placa_vp`) VALUES ( :numero_documento, :placa)");

	$consulta->bindParam(':nombre',$nombre);
	$consulta->bindParam(':apellidos',$apellidos);
	$consulta->bindParam(':direccion',$direccion);
	$consulta->bindParam(':numero_documento',$numero_documento);
	$consulta->bindParam(':tipo_documento',$tipo_documento);
	$consulta->bindParam(':telefono',$telefono);
	$consulta->bindParam(':correo_electronico',$correo_electronico);
	$consulta->bindParam(':observaciones',$observaciones);

	$consulta1->bindParam(':placa',$placa);
	$consulta1->bindParam(':tipo_vehiculo',$tipo_vehiculo);
	$consulta1->bindParam(':color',$color);
	$consulta1->bindParam(':modelo',$modelo);
	$consulta1->bindParam(':marca',$marca);
                                 
    $consulta2->bindParam(':numero_documento',$numero_documento);
	$consulta2->bindParam(':placa',$placa);

    // ejecutar la consulta

 if($consulta->execute() && $consulta1->execute() && $consulta2->execute()){
        ?>
<script>
    alert('Cliente Creado con exito');
    window.location.href = 'crear_cliente.php';

</script>
<?php    
    }else {
           ?>
<script>
    alert('Error, verifique por favor');
    window.location.href = 'crear_cliente.php';

</script>
<?php   
        } 
	

    // volver a ejecutar la consulta
?>
