<?php
include "seguridad/seguridad.php";
?>
<?php
   
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="theme-color" content="#000" />
	<title>Menú</title>
	<link rel="shorcut icon" type="image/x-icon" href="imagenes/favicon.ico">
	<link rel="stylesheet" href="css/estilos.css" type="text/css">
	<!--    <link rel="stylesheet" href="css/preloader.css" type="text/css">-->
	<!--    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">-->
	<script src="js/jquery.min.js" type="text/javascript"></script>
</head>
<header>
	<!--<div class="menu-responsive" >-->
	<div class="logo"><img src="imagenes/preloader.png" alt=""></div>
	<nav>
		<ul>
			<li><a href="" class="usuario1"><img class="usuario" src="imagenes/user.svg" alt="">
					<br />Bienvenido <?php echo $_SESSION['usuario']; ?></a></li>
			<li><a href="" class="active">Inicio</a></li>
			<li><a href="">Entrada</a></li>
			<li><a href="">Salida</a></li>
			<li><a href="">Reportes</a></li>
			<li><a href="">Mensualidades</a></li>
			<li class="submenu"><a>Cliente</a>
				<ul>
					<li><a href="">Crear</a></li>
					<li><a href="">Editar/Eliminar</a></li>
				</ul>
			</li>
			<li class="submenu"><a>Usuario</a>
				<ul>
					<li><a href="">Crear</a></li>
					<li><a href="">Editar/Eliminar</a></li>
				</ul>
			</li>
			<li><a href="">
					<p style="width: 50vw;text-align: right;float: left;">Salir</p><img class="salirr" src="imagenes/salir.png" class="img_salir" href="cerrar_session.php?tk=<?php echo$_SESSION['token'];?>" />
				</a> </li>

		</ul>
	</nav>
	<div class="menu"><img src="imagenes/menu.svg" alt=""></div>
	<!--</div>-->
</header>

<body>
	<div class="block">
		<div class="container">
			<div class="wrap">

				<div class="widget">
					<div class="fecha">
						<p id="diaSemana" class="diaSemana"></p>
						<p id="dia" class="dia"></p>
						<p>de</p>
						<p id="mes" class="mes"></p>
						<p>del</p>
						<p id="year" class="year"></p>
					</div>

					<div class="reloj">
						<p id="horas" class="horas"></p>
						<p>:</p>
						<p id="minutos" class="minutos"></p>
						<p>:</p>
						<div class="caja-segundos">
							<p id="ampm" class="ampm"></p>
							<p id="segundos" class="segundos"></p>
						</div>

					</div>
					<div class="nombre">
						<p>BIENVENIDO
							<?php echo $_SESSION['usuario']; ?>
						</p>
						<a class="salir" href="cerrar_session.php?tk=<?php echo$_SESSION['token'];?>"><img src="imagenes/salir.png" class="img_salir" href="cerrar_session.php?tk=<?php echo$_SESSION['token'];?>" /></a>
					</div>
				</div>

			</div>
			<div class="prueba">
				<!--<p class="titulo">Cupos</p>-->
				<div class="moto">
					<p class="subtitulo">Motocicleta</p>
					<div class="img_moto"></div>
					<div>
						<p>Total cupos:</p>
						<p id="tipo1" type="number" style="color:#fff; text-align:center;">50</p>
						<p>Cupos ocupados:</p>
						<p id="tipo2" type="number" class="tipo2 cant_moto_ocup">

						</p>
						<p>Cupos disponibles:</p>
						<p id="tipo3" type="number" class="tipo3 cant_moto_disp">
						</p>
					</div>
				</div>
				<div class="auto">
					<p class="subtitulo">Automovil</p>
					<div class="img_auto"></div>
					<div>
						<p>Total cupos:</p>
						<p id="tipo1" type="number" style="color:#fff; text-align:center;">50</p>
						<p>Cupos ocupados:</p>
						<p id="tipo4" type="number" class="tipo2 cant_auto_ocup">
						</p>
						<p>Cupos disponibles:</p>
						<p id="tipo5" type="number" class="tipo3 cant_auto_ocup">
						</p>
					</div>
				</div>


			</div>
		</div>

	</div>
	<section>
		<div class="loader"></div>
		<div class="count"></div>
	</section>

	<!--    <div class="preloader">
        <div class="loader"></div>
    </div>

    <!--Tabs -->
	<div class="tab">
		<div class="botones">
			<ul>
				<li>
					<a id="myBtn">
						<div class="icon">
							<div class="icon boton-m bt1"></div>
							<div class="icon boton-m bt1"></div>
						</div>

						<div class="name"><span data-text="Entrada&nbsp;Vehiculo">Entrada Vehiculo</span></div>
					</a>
				</li>
				<li>
					<a id="myBtn1">
						<div class="icon">

							<div class="icon boton-m bt2"></div>
							<div class="icon boton-m bt2"></div>
						</div>
						<div class="name"><span data-text="Salida&nbsp;Vehiculo">Salida Vehiculo</span>
						</div>

					</a>
				</li>
				<li>
					<a id="myBtn3">
						<div class="icon">

							<div class="icon boton-m bt3"></div>
							<div class="icon boton-m bt3"></div>
						</div>
						<div class="name"><span data-text="Reportes">Reportes</span></div>
					</a>
				</li>
				<li>
					<a id="myBtn4">
						<div class="icon">

							<div class="icon boton-m bt4"></div>
							<div class="icon boton-m bt4"></div>
						</div>
						<div class="name"><span data-text="Mensualidades">Mensualidades</span></div>

					</a>
				</li>
				<li>
					<a id="myBtn5">
						<div class="icon">

							<div class="icon boton-m bt7"></div>
							<div class="icon boton-m bt7"></div>
						</div>
						<div class="name"><span data-text="Cliente">Cliente</span></div>

					</a>
				</li>
				<li>
					<a id="myBtn6">
						<div class="icon">

							<div class="icon boton-m bt8"></div>
							<div class="icon boton-m bt8"></div>
						</div>

						<div class="name"><span data-text="Usuario">Usuario</span></div>
					</a>
				</li>
			</ul>
			<!--
			<li class=""><a id="myBtn" class="boton-m bt1"><span>Entrada Vehículo</span></a></li>
			<li class=""><a id="myBtn1" class="boton-m bt2"><span>Salida Vehículo</span></a></li>
			<li class=""><a id="myBtn3" class="boton-m bt3"><span>Reportes</span></a></li>
			<li class=""><a id="myBtn4" class="boton-m bt4"><span>Mensualidades</span></a></li>
			<li class=""><a id="myBtn5" class="boton-m bt7"><span>Cliente</span></a></li>
			<li class=""><a id="myBtn6" class="boton-m bt8"><span>Usuario</span></a></li>
-->
		</div>
	</div>

	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="cuadros">
				<span class="close">&times;</span></div>
			<iframe id="test" src="modulos/ingreso/ingreso_vista.php" style="width:100%;height:90vh;"></iframe>
		</div>

	</div>
	<div id="myModal1" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close1">&times;</span>
			<iframe id="test1" src="modulos/salida/salida_vista.php" style="width:100%;height:90vh;"></iframe>
		</div>

	</div>
	<div id="myModal2" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close2">&times;</span>
			<iframe id="test2" src="modulos/salida/salida_vista2.php" style="width:100%;height:90vh;"></iframe>
		</div>

	</div>
	<div id="myModal3" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close3">&times;</span>
			<iframe id="test3" src="modulos/reportes/reportes_vista.php" style="width:100%;height:90vh;"></iframe>
		</div>

	</div>
	<div id="myModal4" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close4">&times;</span>
			<iframe id="test4" src="modulos/pagos/pagos_vista.php" style="width:100%;height:90vh;"></iframe>
		</div>

	</div>

	<div id="myModal5" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close5">&times;</span>
			<iframe id="test5" src="modulos/crear/crear_cliente.php" style="width:100%;height:90vh;"></iframe>
		</div>

	</div>
	<div id="myModal6" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close6">&times;</span>
			<iframe id="test6" src="modulos/crear/crear_operario.php" style="width:100%;height:90vh;"></iframe>
		</div>

	</div>


	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>

	<script>
		$(document).ready(function() {
			$(".jm-loadingpage").fadeOut("slow");
		});

	</script>
	<script src="js/funciones.js" type="text/javascript"></script>

</body>
<footer>
	<h5>Parkingdom 2019 - Todos los derechos reservados</h5>
</footer>

</html>
