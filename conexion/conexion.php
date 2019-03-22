<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=u858238889_park','u858238889_root','parkingdom');
    //echo "conexion Ok";
    
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
?>