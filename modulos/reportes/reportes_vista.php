<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">
    <link rel="stylesheet"  href="css/estiloss.css">
    <script src="../../js/jquery-2.1.3.js"></script>
</head>

<body>
    <section class="seccionToggle">
    <div class="cabecera"><div class="img"><img src="../../imagenes/logoimp.svg" alt="" ></div><div class="texto"><p>Reporte de Parqueadero</p></div></div>
      <div id="mainContenedor">
        <table id="tbtabla" class="tbtabla">
                <thead>
				<tr>
					<th>PLACA</th>
					<th>TIPO DE CLIENTE</th>
					<th>N. DOCUMENTO</th>
					<th>TIPO VEHICULO</th>
					<th>FECHA INICIO</th>
                    <th>FECHA FIN</th>
				</tr>
                </thead>
			</table>
			
		<script type="text/javascript" src="js/jspdf.min.js"></script>
		<script type="text/javascript" src="js/html2canvas.js"></script>
		
		<script type="text/javascript" >
		
			function genPDF(){
			
				html2canvas(document.getElementById("tbtabla")).then(function(canvas){
						var print= canvas.toDataURL("image/png");
						var doc = new jsPDF('p','mm','a4');
						var width=doc.internal.pageSize.width;
						var height=doc.internal.pageSize.height;
						doc.addImage(print, 'JPEG', 0,0,width,height);
						doc.save('reporte.pdf');
					
				});
			}
			
		</script>
	
    </div>
    	<a href="javascript:genPDF();" id="exportar"><input type="submit" id="export" value="Exportar"/></a>
    	<a href="reportes_vista.php" id="exportar"><input type="button" id="export" value="Regresar"></a>
    </section>
    
    
    
     <div class="contenedor">
        <form class="form-style-4" method="post" >
            <label for="field1">
                <span>Tipo Reporte</span>
                <select name="reporte" onchange="esconder();" id="reporte">
                    <option value="0">Seleccione</option>
                    <option value="mensualidades">Mensualidades</option>
                    <option value="transaccion">Transacciones</option>
                    <option value="ingresos">Ingresos</option>

                </select>
            </label>
            <div id="contenedor2">
            <label for="field1" class="cuadro" id="lbltipo_cliente">
                <span>Tipo cliente</span><select name="tipo_cliente" id="tipo_cliente">
                    <option value="0">Seleccione</option>
                    <option value="mensual">Mensual</option>
                    <option value="temporal">Temporal </option>
                </select>
            </label>
            <label for="field1" class="cuadro" id="lbltipo_vehiculo">
                <span>Tipo vehiculo</span><select name="tipo_vehiculo" id="tipo_vehiculo">
                    <option value="0">Seleccione</option>
                    <option value="Automovil">Automovil</option>
                    <option value="motocicleta">Motocicleta</option>
                </select>
            </label>
            <label for="field1" class="cuadro" id="lblplaca">
                <span>Placa</span><input type="text" name="placa" id="placa" />
            </label>
            <label for="field1" class="cuadro" id="lbldoc">
                <span># Documento</span><input type="text" name="num_documento" id="num_documento" />
            </label>
            <label for="field2" class="cuadro" id="lblfechai">
                <span>Fecha Inicio</span><input type="date" name="fecha_ingreso" id="fecha_ingreso" />
            </label>
            <label for="field3" class="cuadro" id="lblfechaf">
                <span>Fecha Fin</span><input type="date" name="fecha_salida"  id="fecha_salida"/>
            </label>
            <label>
                <span>&nbsp;</span><input id="consultar" type="submit" value="Consultar" class="btn-toggle"  />
            </label>
            </div>
        </form>
    </div>
    
    <script src="js/seccion.js"></script>
</body>

<style>
    .print {
        background-image: url(../../imagenes/printer.png);
        width: 8%;
        position: absolute;
        bottom: 10px;
        right: 135px;
        height: 40px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        border: 1px solid green;
        border-radius: 10px;
        cursor: pointer;
    }

    .print:hover {
        background-image: url(../../imagenes/printer_hov.png);

    }

</style>

</html>