<?php


include "conexion/conexionm.php";
   //$conexion=mysqli_connect("localhost","u858238889_root","parkingdom","u858238889_park") or
    //die("Problemas con la conexión");

session_start();
    

$contra = $_POST['contraseña'];   
$correo= $_SESSION['correo'];

    $registros=mysqli_query($conexion,"update usuario set activacion='0',password='$contra' where correo='$correo'") or
  die("Problemas en el select:".mysqli_error($conexion));
    

echo "contraseña modificada";

?>

<html lang="utf-8">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Parkingdom</title>
	<link rel="shorcut icon" type="image/x-icon" href="imagenes/favicon.ico">
	<link rel="stylesheet" href="css/login.css">
	<script src="js/index.js"></script>
</head>

<body>
	<div class="box">
		<img src="imagenes/sunroof%20(2).jpg" class="avatar">
		
        <table>
            <tr><td align="center"><h2> ¡Restablecimiento exitoso!</h2></td></tr>
			<br><br>
<tr><td align="center"><a href="http://localhost:8081/Parkingdom/login.view.php" target="_blank" > Iniciar Sesión </a></td></tr>
            </table>
        </div>

</body>

    
</html>