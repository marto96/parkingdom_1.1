<?php
include "../../seguridad/seguridad.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>

<body>
    <div class="contenedor">
        <form action="repo_mensualidad.php" class="form-style-4" method="post">
            <label for="field1">
                <span>Tipo Reporte</span>
                <select name="reporte" onchange="filtro();" id="reporte">
                    <option value="0">Seleccione</option>
                    <option value="mensualidades">Mensualidades</option>
                    <option value="transaccion">Transacciones</option>
                    <option value="ingresos">Ingresos</option>
                    <option value="todos">Todos</option>

                </select>
            </label>

            <label for="field1">
                <span>Tipo cliente</span><select name="tipo_cliente" id="">
                    <option value="0">Seleccione</option>
                    <option value="mensual">Residente</option>
                    <option value="temporal">Visitante</option>
                </select>
            </label>
            <label for="field1">
                <span>Tipo vehiculo</span><select name="tipo_vehiculo" id="">
                    <option value="0">Seleccione</option>
                    <option value="automovil">Automovil</option>
                    <option value="motocicleta">Motocicleta</option>
                </select>
            </label>
            <label for="field1">
                <span>Placa</span><input type="text" name="placa" required="true" />
            </label>
            <label for="field1">
                <span># Documento</span><input type="text" name="num_documento" required="true" />
            </label>
            <label for="field2">
                <span>Fecha Inicio</span><input type="date" name="fecha_ingreso" required="true" />
            </label>
            <label for="field3">
                <span>Fecha Fin</span><input type="date" name="fecha_salida" required="true" />
            </label>
            <label>
                <span>&nbsp;</span><input type="submit" value="Consultar" class="boton" />
            </label>
        </form>
        <div id="main-container">

            <table>
                <thead>
                    <tr>
                        <th>N° Transaccion</th>
                        <th>Tipo de Vehiculo</th>
                        <th>Placa</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Salida</th>
                        <th>Tiempo Parqueo</th>
                        <th>Valor Tiempo</th>
                        <th>Usuario</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
    //require_once "../../conexion/conexion.php";
    require_once "reportes.php";
    
    ?>

                </tbody>
            </table>
        </div>
        <div href="print" class="print"><a href="">&nbsp;</a></div>
    </div>
</body>
<script>
    function filtro() {
        var fil = Document.getElementById("reporte").value;
        switch (fil) {
            case "mensualidades":
                hide("placa", "num_documento", "fecha_ingreso", "fecha_salida");
                break;
            case "transaccion":
                hide("placa", "tipo_vehiculo", "tipo_cliente", "fecha_ingreso", "fecha_salida");
                break;
        }
    }

    function hide(show, hide) {
        document.getElementById(show).style.display = "block";
        document.getElementById(hide).style.display = "none";
    }

</script>
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
<?php
if(isset($_POST['tipovehiculo']) && isset($_POST['placa'])){
    require_once "ingreso.php";
    require_once "../conexion/ingreso.php";
}


?>
