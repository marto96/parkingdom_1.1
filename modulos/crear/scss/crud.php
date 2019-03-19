<?php 
$con = mysqli_c0nnect("localhost", "root", " ", "parkingdomfinal") or die ("conexion exitosa!");
?>

CREAR CLIENTE    

    //-- insertar

    <?php 
	if(isset($_POST['insert'])){
	
		$nombre = $_POST['Nombres'];
		$apellido = $_POST['Apellidos'];
        $direccion = $_POST['Direccion'];
        $torre = $_POST['Torre'];
        $apartamento = $_POST['Apartamento'];
        $telefono = $_POST['Telefono'];
        $celular = $_POST['Celular'];
        $tipo_documento = $_POST['Tipo de Documento'];
        $cedula = $_POST['Numero documento'];
		$tipo_Vehiculo = $_POST['Tipo de Vehiculo'];
        $placa = $_POST['Placa'];
        $color = $_POST['Color'];
		$modelo = $_POST['Modelo'];
        $correo_electronico = $_POST['Correo Electronico'];
		$observaciones = $_POST['Observaciones'];
		
		
		$insertar = "INSERT INTO persona (Nombres,Apellidos,Direccion,Torre,Apartamento,Telefono,Celular,Tipo de Documento,Numero documento,Tipo de Vehiculo,Placa,Color,Modelo,correo Electronico, Observaciones) values ('$nombres','$apellidos','$direccion','$torre','$apartamento','$telefono','$celular','$tipodocumento','$numerodocumento','$tipodeVehiculo','$placa','$color','$modelo','$correoelectronico', '$observaciones')";
		
		$ejecutar = mysqli_query($con,$insertar);
	
		if($ejecutar){
		
		echo "<h3>Insertado correctamente</h3>";
		}
	}
	
	?>

    //--consulta

    <?php 
			
			
	$consulta = "SELECT * FROM persona";
			
	$ejecutar = mysqli_query($con, $consulta);  
			
	$i = 0;
			
	while($fila=mysqli_fetch_array($ejecutar)){	
                
    $idpersona = $fila['idpersona'];
	$nombre = $fila['Nombres']; 
	$apellidos = $fila['Apellidos'];
	$direccion = $fila['Direccion'];
	$torre = $fila['Torre'];
	$apartamento = $fila['Apartamento'];
	$telefono = $fila['Telefono'];
	$celular = $fila['Celular'];
	$tipodocumento = $fila['Tipo de Documento'];
    $cedula = $fila['Numero Documento'];
	$tipovehiculo = $fila['Tipo de Vehiculo'];
	$placa = $fila['Placa'];
	$color = $fila['Color'];
	$modelo = $fila['Modelo'];
    $correoElectronco = $fila['Correo Electronico'];
    $observaciones = $fila['Observaciones'];
	
        
    $i++;	
			
?>		

        <tr align="center">
			<td><?php echo $idpersona; ?></td>
			<td><?php echo $nombre; ?></td>
			<td><?php echo $apellidos; ?></td>
			<td><?php echo $direccion; ?></td>
			<td><?php echo $torre; ?></td>
			<td><?php echo $apartamento; ?></td>
			<td><?php echo $telefono; ?></td>
			<td><?php echo $celular; ?></td>
			<td><?php echo $tipodocumento; ?></td>
			<td><?php echo $cedula; ?></td>
			<td><?php echo $tipovehiculo; ?></td>
			<td><?php echo $placa; ?></td>
			<td><?php echo $color; ?></td>
            <td><?php echo $modelo; ?></td>
            <td><?php echo $correoelectronico; ?></td>
            <td><?php echo $observaciones; ?></td>
			<td><a href="crud.php?editar=<?php echo $idpersona; ?>">Editar</a></td>
			<td><a href="crud.php?eliminar=<?php echo $idpersona; ?>">Eliminar</a></td>
		</tr>
		<?php } ?>

    

    //-- eliminar

    <?php
		if(isset($_GET['editar'])){
		include("crear.php");
		}
	?> 
	

    <?php 
	if(isset($_GET['eliminar'])){
	
	$eliminar_idpersona = $_GET['eliminar'];
	
	$eliminar = "DELETE FROM persona WHERE idpersona='$eliminar_idpersona'";
	
	$ejecutar = mysqli_query($con,$eliminar); 
		
		if($ejecutar){
		
		echo "<script>alert('El usuario ha sido borrado!')</script>";
		echo "<script>window.open('crud.php','_self')</script>";
		}
	
	}
	
	?>

    CREAR OPERARIO

    //-- insertar

    <?php 
	if(isset($_POST['insert'])){
	
		$nombre = $_POST['Nombres'];
		$apellido = $_POST['Apellidos'];
        $usuario = $_POST['Usuario'];
        $correo_electronico = $_POST['Correo Electronico'];
		$password = $_POST['Contraseña'];
		
		
		$insertar = "INSERT INTO operario (Nombres,Apellidos,Usuario,Correo Electronico, Contraseña) values ('$nombres','$apellidos','$usuario','$correoelectronico', '$password')";
		
		$ejecutar = mysqli_query($con,$insertar);
	
		if($ejecutar){
		
		echo "<h3>Insertado correctamente</h3>";
		}
	}
	
	?>

    //--consulta

    <?php 
			
			
	$consulta = "SELECT * FROM operario";
			
	$ejecutar = mysqli_query($con, $consulta);  
			
	$i = 0;
			
	while($fila=mysqli_fetch_array($ejecutar)){	
                
    $idpersona = $fila['idoperario'];
	$nombre = $fila['Nombres']; 
	$apellidos = $fila['Apellidos'];
	$usuario = $fila['Usuario'];
	$correoElectronco = $fila['Correo Electronico'];
    $password = $fila['Contraseña'];
	
        
    $i++;	
			
?>		

        <tr align="center">
			<td><?php echo $idpersona; ?></td>
			<td><?php echo $nombre; ?></td>
			<td><?php echo $apellidos; ?></td>
			<td><?php echo $password; ?></td>
			<td><?php echo $correoelectronico; ?></td>
            <td><?php echo $password; ?></td>
			<td><a href="crud.php?editar=<?php echo $idoperario; ?>">Editar</a></td>
			<td><a href="crud.php?eliminar=<?php echo $idoperario; ?>">Eliminar</a></td>
		</tr>
		<?php } ?>


//-- eliminar

    <?php
		if(isset($_GET['editar'])){
		include("crear.php");
		}
	?> 
	

    <?php 
	if(isset($_GET['eliminar'])){
	
	$eliminar_idoperario = $_GET['eliminar'];
	
	$eliminar = "DELETE FROM persona WHERE idpersona='$eliminar_idoperario'";
	
	$ejecutar = mysqli_query($con,$eliminar); 
		
		if($ejecutar){
		
		echo "<script>alert('El usuario ha sido borrado!')</script>";
		echo "<script>window.open('crud.php','_self')</script>";
		}
	
	}
	
	?>
