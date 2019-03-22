<?php

include "../../conexion/conexion.php";
   try{
   // $conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom',array( PDO::ATTR_EMULATE_PREPARES=>false,
    //PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
    //PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
//));


        $statement = $conexion->prepare("SELECT espacio_tr  FROM transaccion where hora_salida is null");
        $statement->execute();
        $resultados = $statement->fetchAll();
        //print_r ($resultados);
        
   
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}




?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="../../js/jquery.min.js"></script>
	<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
</head>

<body>

	<div class="cuadro">
		<div class="modulos 1" id="1"></div>
		<div class="modulos 2" id="2"></div>
		<div class="modulos 3" id="3"></div>
		<div class="modulos 4" id="4"></div>
		<div class="modulos 5" id="5"></div>
		<div class="modulos 6" id="6"></div>
		<div class="modulos 7" id="7"></div>
		<div class="modulos 8" id="8"></div>
		<div class="modulos 9" id="9"></div>
		<div class="modulos 10" id="10"></div>
		<div class="modulos 11" id="11"></div>
		<div class="modulos 12" id="12"></div>
		<div class="modulos 13" id="13"></div>
		<div class="modulos 14" id="14"></div>
		<div class="modulos 15" id="15"></div>
		<div class="modulos 16" id="16"></div>
		<div class="modulos 17" id="17"></div>
		<div class="modulos 18" id="18"></div>
		<div class="modulos 19" id="19"></div>
		<div class="modulos 20" id="20"></div>
		<div class="modulos 21" id="21"></div>
		<div class="modulos 22" id="22"></div>
		<div class="modulos 23" id="23"></div>
		<div class="modulos 24" id="24"></div>
		<div class="modulos 25" id="25"></div>
		<div class="modulos 26" id="26"></div>
		<div class="modulos 27" id="27"></div>
		<div class="modulos 28" id="28"></div>
		<div class="modulos 29" id="29"></div>
		<div class="modulos 30" id="30"></div>
		<div class="modulos 31" id="31"></div>
		<div class="modulos 32" id="32"></div>
		<div class="modulos 33" id="33"></div>
		<div class="modulos 34" id="34"></div>
		<div class="modulos 35" id="35"></div>
		<div class="modulos 36" id="36"></div>
		<div class="modulos 37" id="37"></div>
		<div class="modulos 38" id="38"></div>
		<div class="modulos 39" id="39"></div>
		<div class="modulos 40" id="40"></div>
		<div class="modulos 41" id="41"></div>
		<div class="modulos 42" id="42"></div>
		<div class="modulos 43" id="43"></div>
		<div class="modulos 44" id="44"></div>
		<div class="modulos 45" id="45"></div>
		<div class="modulos 46" id="46"></div>
		<div class="modulos 47" id="47"></div>
		<div class="modulos 48" id="48"></div>
		<div class="modulos 49" id="49"></div>
		<div class="modulos 50" id="50"></div>
		<div class="modulos 51" id="51"></div>
		<div class="modulos 52" id="52"></div>
		<div class="modulos 53" id="53"></div>
		<div class="modulos 54" id="54"></div>
		<div class="modulos 55" id="55"></div>
		<div class="modulos 56" id="56"></div>
		<div class="modulos 57" id="57"></div>
		<div class="modulos 58" id="58"></div>
		<div class="modulos 59" id="59"></div>
		<div class="modulos 60" id="60"></div>
	</div>
</body>
<style>
	.cuadro div {
		width: 35px;
		height: 65px;
		float: left;
	}

	.cuadro {
		background-image: url(../../imagenes/parqueadero.svg);
		background-repeat: no-repeat;
		background-size: contain;
		margin: auto;
		width: 80%;
		height: 600px;
	}

	.active:hover {
		pointer-events: none;
		cursor: not-allowed;
		background-image: url(../../imagenes/car-top.svg)!important;
		background-size: contain!important;
		background-repeat: no-repeat!important;
		
	}

	.active {
		background-image: url(../../imagenes/car-top.svg);
		background-size: contain;
		background-repeat: no-repeat;
	}

	.modulos:hover {
		cursor: pointer;
		background: rgba(0, 0, 0, 0.6);
	}

</style>
<script>
	function ver(e) {
		var lugar = e;
		parent.document.getElementById("n_ubicacion").value = lugar;
		_enviarAlPadre();

	}
	var arrayJS = <?php echo json_encode($resultados);?>;

	var chkAsientos = document.getElementsByClassName("modulos");
	for (l = 0; l < arrayJS.length; l++) {
		//console.log(arrayJS[l]);

		//function asignar(){
		var asientos = [];
		for (i = 0; i < chkAsientos.length; i++) {
			if (chkAsientos[i].id == arrayJS[l].espacio_tr) {
				chkAsientos[i].classList.add('active');
			}
			//	console.log(chkAsientos[i].id);
		}
	}
	$('.modulos').click(function(e) {
		var para = e["target"].id;
		ver(para);
		$(e.target).addClass("active");
	});

	function _enviarAlPadre() {
		window.parent._ocultarIframe();
	}

</script>

</html>
