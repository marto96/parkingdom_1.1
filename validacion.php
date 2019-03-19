 
<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


    
$conexion=mysqli_connect("localhost","root","","parkingdom") or
    die("Problemas con la conexión");

$correo= $_REQUEST['correo_rec'];
$token= generartoken();



$registros=mysqli_query($conexion,"select usuario,password,correo,nombre,apellidos,token,activacion
                        from usuario where correo='$correo'") or
  die("Problemas en el select:".mysqli_error($conexion));




if ($reg=mysqli_fetch_array($registros)){
   
  if($reg['correo']=$correo){
      
      if ($reg['activacion']==0){
            $solicitud=mysqli_query($conexion,"update usuario set token='$token',activacion='1' where correo='$correo' ") or
                die("Problemas en el select:".mysqli_error($conexion));
      
          $url='http://'.$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].'/Parkingdom/activar.php?mail='.$correo.'&val='.$token;
          
          $asunto = 'Reestablecimiento de contraseña PARKINGDOM';
          $cuerpo = "Estimado ".$reg['nombre']." ".$reg['apellidos'].": <br /><br /> Para continuar con el reestablecimiento de la contraseña, debe dar click en el siguiente enlace: <a href='$url'> Reestablecer contraseña</a> ";  
          
       (enviarcorreo($correo, $reg['nombre'].$reg['apellidos'], $asunto, $cuerpo));
//              Para terminar el proceso siga las instrucciones enviadas al correo electrónico ".$correo." <br><br>
//              Iniciar sesión <a href= http://localhost/Parkingdom/login.view.php> PARKINGDOM </a>
              echo "ok";
                
               
      
      } else{
//		  Ya se envió el reestablecimiento
            echo "ya";
        }

  }
    else
    {
//		No existe un usuario con esa dirección de correo electrónico
        echo "no";
    }
}else{
//	No existen registros
    echo "nada";
}
mysqli_close($conexion);

function generartoken(){
    
    $gen= md5(uniqid(mt_rand(),false));
    return $gen;
}

function enviarcorreo($correo,$nombre,$asunto,$cuerpo){

require'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host ='smtp.hostinger.co';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'administracion@parkingdom.site';                 // SMTP username
    $mail->Password = 'parkingdom';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('administracion@parkingdom.site', 'PARKINGDOM');
    $mail->addAddress($correo, $nombre);     // Add a recipient
  
    //Conten
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    
    $mail->send();
    
} catch (Exception $e) {
    echo 'Error al enviar el mensaje: ', $mail->ErrorInfo;
}
}



?>

 
    
