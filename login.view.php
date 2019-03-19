<!DOCTYPE html>
<html lang="utf-8">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#000" />
	<title>Parkingdom</title>
	<link rel="shorcut icon" type="image/x-icon" href="imagenes/favicon.ico">
	<link rel="stylesheet" href="css/login.css">
	<script src="js/login.js"></script>
</head>

<body>
	<div class="box">
		<img src="imagenes/sunroof%20(2).jpg" class="avatar">
		<form name="login" method="post" action="" onSubmit="enviarDatos(); return false">
			<h2>Bienvenido</h2>
			<div class="inputBox">
				<input name="usuario" type="text" class="input" required="" />
				<label>Usuario</label>
			</div>
			<div class="inputBox">
				<input name="password" type="password" class="input" required="" />
				<label>Contraseña</label>
			</div>
			<a onclick="recuperar();"><u>¿Olvidaste tu contraseña?</u></a>
			<br><br>
			<input value="Entrar" type="submit" class="boton" />


		</form>

	</div>
	<div id="myModal" class="modal cuad1">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
				<span class="close">&times;</span></div>
			<p>Usuario o contraseña Incorrecto. <br> Verifique por favor</p>
			<button class="close botons">Aceptar</button>
		</div>

	</div>
	<div id="myModal1" class="modal cuad2">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
				<span class="close1">&times;</span></div>
			<form name="recuperar1" method="post" onSubmit="envio(); return false">
				<p>Ingrese su correo Electronico de verificación</p>
                <table class="corre" >
				<tr><td align="center"><input type="email" class="correo_rec" name="correo_rec" id="correo_rec" required /></td></tr>
                   <tr><td>  </td></tr>
                    
				<tr><td align="center"><input id="validar" class="close btons acept" type="submit" value= "Aceptar"></td></tr>
                 </table>
			</form>
		</div>

	</div>
	<div id="myModal2" class="modal cuad3">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
				<span class="close">&times;</span></div>
			<img src="imagenes/correcto.svg" alt="">
			<p>Correo de recuperación se ha enviado correctamente</p>
			<button class="close botons">Aceptar</button>
		</div>

	</div>
	<div id="myModal3" class="modal cuad4">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
				<span class="close">&times;</span></div>
			<img class="img_error"src="imagenes/error.png" alt="Error">
			<p id="texto_err" class="texto_err">Se ha presentado un problema al enviar Correo de recuperación.<br> verifique por favor</p>
			<button class="close botons btn_err">Aceptar</button>
		</div>

	</div>

</body>

</html>
