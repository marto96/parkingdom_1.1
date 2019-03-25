<?php


include "conexion/conexionm.php";

//$conexion=mysqli_connect("localhost","u858238889_root","parkingdom","u858238889_park") or
  //  die("Problemas con la conexión");

if (!isset($_GET['val'])or !isset($_GET['mail']) ){
    header ('Location:login.view.php');
   
    }else{
    session_start();
    
    $_SESSION['correo']= $_GET['mail'];
    
     $token= $_GET['val'];
    $correo= $_GET['mail'];
    
     $registros=mysqli_query($conexion,"select token,activacion
                        from usuario where correo='$correo'") or
  die("Problemas en el select:".mysqli_error($conexion));
    
        
        if($reg=mysqli_fetch_array($registros)){
            
         if ($reg['activacion']!=1 || $reg['token']!=$token){
                 
            //      echo "Código de reestablecimiento vencido";
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
		<form name="login" method="post" action="login.view.php">
			<h2>Código de reestablecimiento vencido<br />Intente de nuevo</h2>
			<div class="inputBox">

				<input onclick="login.view.php" value="Inicio" type="submit" class="boton" />
			</div>

		</form>

	</div>
</body>
</html>
<?php   
                }else{
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
		<form name="login" method="post" action="final.php">
			<h2>Ingrese nueva contraseña: </h2>
			<div class="inputBox">
				<input name="contraseña" type="password" class="input" required="" />
				<br><br>
				<input value="Reestablecer" type="submit" class="boton" />
			</div>
		</form>
	</div>
</body>
</html>
<?php   
            }
        }else{
             echo "No hay registros";
        }
    }
 mysqli_close($conexion);   
?>
