<?php
try{
      $conexion= new PDO('mysql:host=localhost;dbname=parkingdom','root','');
  }catch(PDOException $e){
      echo "Error:" . $e->getMessage();
  }

$usuario=$_POST['usuario'];
$clave=$_POST['password'];
$acceso = null;
$consulta=$conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND password= :password');


$consulta->bindParam(':usuario',$usuario);
$consulta->bindParam(':password',$clave);

$consulta->execute();



if ($consulta->rowCount()>=1){
    session_start();
    $fila=$consulta->fetch();
    $_SESSION['usuario']=$fila['nombre'];
    $_SESSION['password']=$fila['password'];
    $_SESSION['token']=md5(uniqid(mt_rand(),true));
		$acceso = "si";
	}else{
    		$acceso = "no";
}


	//Mostramos el resultado. Este 'echo' será el que recibirá la conexión AJAX
	echo $acceso;





//if($consulta->rowCount()>=1){
//session_start();
 //   $fila=$consulta->fetch();
  //  $_SESSION['usuario']=$fila['nombre'];
  //  $_SESSION['password']=$fila['password'];
   // $_SESSION['token']=md5(uniqid(mt_rand(),true));
   // header("Location: menu.php");
//}else{
   // 
 //   alert('Usuario o Contraseña incorrecta intenta de nuevo');
 //   window.location.href = 'login.view.php';

//</script>



?>
