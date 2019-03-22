<?php

try{
    $conexion=mysqli_connect("localhost","u858238889_root","parkingdom","u858238889_park"); 

    //echo "conexion Ok";
    
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}
?>
