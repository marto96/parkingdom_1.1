//-- formato operario


<?php 
    
    if(isset($_GET['editar'])){
    $editar_idoperario= $_GET['editar'];
    
    $consulta = "SELECT * FROM operario WHERE idoperario'$editar_idoperario'";
    $ejecutar = mysqli_query($con, $consulta);
    
    $fila=mysqli_fetch_array($ejecutar);
    
    $nombre = $fila['Nombres']; 
	$apellidos = $fila['Apellidos'];
	$usuario = $fila['Usuairo'];
	$password = $fila['Contraseña'];
    
}

//--formato clientes

	<?php 
    
    if(isset($_GET['editar'])){
    $editar_idpersona= $_GET['editar'];
    
    $consulta = "SELECT * FROM persona WHERE idpersona'$editar_idpersona'";
    $ejecutar = mysqli_query($con, $consulta);
    
    $fila=mysqli_fetch_array($ejecutar);
    
				$nombre = $fila['Nombres']; 
				$apellidos = $fila['Apellidos'];
                $direccion = $fila['Direccion'];
                $torre = $fila['Torre'];
                $apartamento = $fila['Apartamento'];
                $telefono = $fila['Telefono'];
                $celular = $fila['Celular'];
                $tipodocumento = $fila['Tipo de Documento'];
                $cedula = $fila['Numero documento'];
				$tipovehiculo = $fila['Tipo de Vehiculo'];
                $placa = $fila['Placa'];
                $color = $fila['Color'];
				$modelo = $fila['Modelo'];
                $correoelectronico = $fila['Correo Electronico'];
				$observaciones = $fila['Observaciones'];
				
}

//--formato operarios

	<?php 
    
    if(isset($_GET['editar'])){
    $editar_idoperario= $_GET['editar'];
    
    $consulta = "SELECT * FROM persona WHERE idpersona'$editar_idoperario'";
    $ejecutar = mysqli_query($con, $consulta);
    
    $fila=mysqli_fetch_array($ejecutar);
    
				$nombre = $fila['Nombres']; 
				$apellidos = $fila['Apellidos'];
                $usuario = $fila['Usuario'];
                $correoelectronico = $fila['Correo Electronico'];
				$password = $fila['Contraseña'];
				
}