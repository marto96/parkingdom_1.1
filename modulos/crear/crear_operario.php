<?php
include "../../seguridad/seguridad.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear</title>
    <link rel="shorcut icon" type="image/x-icon" href="../../imagenes/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="login" class="login">
        <div class="form">

            <div class="tab-content">
                <div id="signup">
                    <h1>Registrar Operario</h1>

                    <form action="guardar2.php" method="post">


                        <div class="field-wrap">
                            <label>
                                Nombres<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name="nombres" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Apellidos<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name="apellidos" />
                        </div>


                        <div class="field-wrap">
                            <label>
                                Correo Electronico<span class="req">*</span>
                            </label>
                            <input type="email" required autocomplete="off" name="correo" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Usuario<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name="usuario" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Contraseña<span class="req">*</span>
                            </label>
                            <input type="password" required autocomplete="off" name="contraseña" id="contra" class="contra" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Confirmar Contraseña<span class="req">*</span>
                            </label>
                            <input type="password" required autocomplete="off" name="confirmar_contraseña" id="contra1" class="contra1" />
                        </div>
                        <div class="error_box" id="error_box">
                            <p>Las contraseñas no coinciden,Verifique por favor.</p>
                        </div>
                        <button type="submit" class="button button-block">Registrar</button>
                        <button class="button button-block">Cancelar</button>

                    </form>

                </div>

                <form action="/" method="post">

                </form>
                <?php
    //datos clientes
     if (isset($_POST['nombres']) && isset($_POST['apellidos']) &&  isset($_POST['correo_electronico']) && isset($_POST['usuario']) && isset($_POST['contraseña'])){
       
         require_once '../../conexion/conexion.php';
         require_once 'guardar2.php';
       }
?>
            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->

    <script>
        var input3 = document.getElementById("contra1");

        input3.addEventListener('focusout', function() {
            var input1 = document.getElementById("contra").value;
            var input2 = document.getElementById("contra1").value;

            if (input1 != input2) {
                error_box.classList.add('active');
                return false;

            } else {
                error_box.classList.remove('active');
                return true;

            }
        });

    </script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>

</html>
