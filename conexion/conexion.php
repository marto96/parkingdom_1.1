<?php

try{
    Class dbObj{
    $conexion = new PDO('mysql:host=localhost;dbname=parkingdom','root','');
    echo "conexion Ok";
    }
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
?>