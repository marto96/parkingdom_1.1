 
<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


    
$conexion=mysqli_connect('localhost','root','','parkingdom') or
    die('Problemas con la conexión');

$correo= $_REQUEST['correo_rec'];
$token= generartoken();



$registros=mysqli_query($conexion,'select usuario,password,correo,nombre,apellidos,token,activacion
                        from usuario where correo='$correo'') or
  die('Problemas en el select:'.mysqli_error($conexion));




if ($reg=mysqli_fetch_array($registros)){
   
  if($reg['correo']=$correo){
      
      if ($reg['activacion']==0){
            $solicitud=mysqli_query($conexion,'update usuario set token='$token',activacion='1' where correo='$correo' ') or
                die('Problemas en el select:'.mysqli_error($conexion));
      
          $url='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/Parkingdom/activar.php?mail='.$correo.'&val='.$token;
          
          $asunto = 'Reestablecimiento de contraseña PARKINGDOM';
//          $cuerpo = 'Estimado '.$reg['nombre'].' '.$reg['apellidos'].': <br /><br /> Para continuar con el reestablecimiento de la contraseña, debe dar click en el siguiente enlace: <a href='$url'> Reestablecer contraseña</a> ';  
		  
		   $cuerpo = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport'' content='width=device-width, initial-scale=1'' />
    <title>Skyline Ping Email</title>
    <style type='text/css'>
        @import url('https://fonts.googleapis.com/css?family=Black+Ops+One|Signika');
        /* Take care of image borders and formatting */

        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a {
            text-decoration: none;
            border: 0;
            outline: none;
            color: #3ead47;
        }

        a img {
            border: none;
        }

        /* General styling */

        td,
        h1,
        h2,
        h3 {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 400;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100%;
            height: 100%;
            color: #37302d;
            background: #ffffff;
        }

        table {
            background:
        }

        h1,
        h2,
        h3 {
            padding: 0;
            margin: 0;
            color: #ffffff;
            font-weight: 400;
        }

        h3 {
            color: #3ead47;
            font-size: 24px;
        }
    </style>

    <style type='text/css' media='screen'>
        @media screen {

            /* Thanks Outlook 2013! http://goo.gl/XLxpyl*/
            td,
            h1,
            h2,
            h3 {
                font-family: 'Signika', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
        }
    </style>

    <style type='text/css' media='only screen and (max-width: 480px)'>
        /* Mobile styles */
        @media only screen and (max-width: 480px) {
            table[class='w320'] {
                width: 320px !important;
            }

            table[class='w300'] {
                width: 300px !important;
            }

            table[class='w290'] {
                width: 290px !important;
            }

            td[class='w320'] {
                width: 320px !important;
            }

            td[class='mobile-center] {
                text-align: center !important;
            }

            td[class='mobile-padding'] {
                padding-left: 20px !important;
                padding-right: 20px !important;
                padding-bottom: 20px !important;
            }
        }
    </style>
</head>

<body class='body' style='padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
    <table align='center' cellpadding='0' cellspacing='0' width='100%' height='100%'>
        <tr>
            <td align='center' valign='top' bgcolor='#ffffff' width='100%'>

                <table cellspacing='0' cellpadding='0' width='100%'>
                    <tr>
                        <td style='border-bottom: 3px solid #3ead47;' width='100%'>
                            <center>
                                <table cellspacing='0' cellpadding='0' width='500' class='w320'>
                                    <tr>
                                        <td valign='top' style='padding:10px 0; text-align:left;' class='mobile-center'>
                                            <img src='preloader.png' style='float: left;width: 50%;height: auto;'>
                                            <p style=' font-family: 'Black Ops One', cursive;font-size: 43px;width: 50%;float: left;color: #fff;text-shadow: 2px 2px 8px #000;'>PARKINGDOM</p>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td background='serge-kutuzov-229068-unsplash.jpg' bgcolor='#64594b' valign='top' style='background: url(http://parkingdom.site/imagenes/serge-kutuzov-229068-unsplash.jpg) no-repeat center;background-attachment: fixed; background-color: #64594b; background-position: center;'>
                            <!--[if gte mso 9]>
          <v:rect xmlns:v='urn:schemas-microsoft-com:vml' fill='true' stroke='false' style='mso-width-percent:1000;height:303px;'>
            <v:fill type='tile' src='https://www.filepicker.io/api/file/ewEXNrLlTneFGtlB5ryy' color='#64594b' />
            <v:textbox inset='0,0,0,0'>
          <![endif]-->
                            <div>
                                <center>
                                    <table cellspacing='0' cellpadding='0' width='530' height='303' class='w320'>
                                        <tr>
                                            <td valign='middle' style='vertical-align:middle; padding-right: 15px; padding-left: 15px; text-align:left;' class='mobile-center' height='303'>

                                                <h1 style='background: #ffffff9e;
    text-shadow: 1px 2px #000;'>Reestablecimiento de Contraseña!</h1>

                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </div>
                            <!--[if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]-->
                        </td>
                    </tr>
                    <tr>
                        <td valign='top'>
                            <center>
                                <table cellspacing='0' cellpadding='0' width='500' class='w320'>
                                    <tr>
                                        <td>

                                            <table cellspacing='0' cellpadding='0' width='100%'>
                                                <tr>
                                                    <td class='mobile-padding' style='text-align:left;'>
                                                        <br>
                                                        <br>
                                                        Hola ".$reg['nombre'].",<br><br>
                                                        Pare restaurar tu cuenta da click al boton acontinuación ,si no realizaste esta solicitud contacta a <a href='#'>administracion@parkingdom.site</a>
                                                        <br>

                                                        <br>
                                                        Gracias por confiar en nosotros!<br>
                                                        <a>Parkingdom.site</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='mobile-padding'>
                                            <br>
                                            <br>
                                            <table cellspacing='0' cellpadding='0' width='100%'>
                                                <tr>
                                                    <td style='width:200px; background-color: #3ead47;'>
                                                        <div>
                                                            <!--[if mso]>
                            <v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='#' style='height:33px;v-text-anchor:middle;width:200px;' arcsize='8%' stroke='f' fillcolor='#3bcdc3'>
                              <w:anchorlock/>
                              <center style='color:#ffffff;font-family:sans-serif;font-size:13px;'>Review Account Settings</center>
                            </v:roundrect>
                          <![endif]-->
                                                            <!--[if !mso]><!-- --><a href='#'>
                                                                <table cellspacing='0' cellpadding='0' width='100%'>
                                                                    <tr>
                                                                        <td style='background-color:#3ead47;border-radius:0px;color:#ffffff;display:inline-block;font-family:'Lato', Helvetica, Arial, sans-serif;font-weight:bold;font-size:13px;line-height:33px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;'><span href='$url';style='color:#ffffff'>Reestablecer Contraseña</span></td>
                                                                    </tr>
                                                                </table>
                                                            </a>
                                                            <!--<![endif]-->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>&nbsp;
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td style='background-color:#c2c2c2;'>
                            <center>
                                <table cellspacing='0' cellpadding='0' width='500' class='w320'>
                                    <tr>
                                        <td>
                                            <table cellspacing='0' cellpadding='30' width='100%'>
                                                <tr>
                                                    <td style='text-align:center;'>
                                                        <a href='#'>
                                                            <img width='61' height='51' src='https://www.filepicker.io/api/file/vkoOlof0QX6YCDF9cCFV' alt='twitter' />
                                                        </a>
                                                        <a href='#'>
                                                            <img width='61' height='51' src='https://www.filepicker.io/api/file/fZaNDx7cSPaE23OX2LbB' alt='google plus' />
                                                        </a>
                                                        <a href='#'>
                                                            <img width='61' height='51' src='https://www.filepicker.io/api/file/b3iHzECrTvCPEAcpRKPp' alt='facebook' />
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <table style='margin:0 auto;' cellspacing='0' cellpadding='5' width='100%'>
                                                    <tr>
                                                        <td style='text-align:center; margin:0 auto;' width='100%'>
                                                            <a href='#' style='text-align:center;'>
                                                               <p style=' font-family: 'Black Ops One', cursive;font-size: 20px;color: #fff;text-shadow: 2px 2px 8px #000;'>PARKINGDOM 2019</p>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>";
          
       (enviarcorreo($correo, $reg['nombre'].$reg['apellidos'], $asunto, $cuerpo));
//              Para terminar el proceso siga las instrucciones enviadas al correo electrónico '.$correo.' <br><br>
//              Iniciar sesión <a href= http://localhost/Parkingdom/login.view.php> PARKINGDOM </a>
              echo 'ok';
                
               
      
      } else{
//		  Ya se envió el reestablecimiento
            echo 'ya';
        }

  }
    else
    {
//		No existe un usuario con esa dirección de correo electrónico
        echo 'no';
    }
}else{
//	No existen registros
    echo 'nada';
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

 
    
