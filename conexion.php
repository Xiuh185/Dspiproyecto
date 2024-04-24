<?php
function conexionphp(){
$server = "localhost";
 $user = "root";
 $pass = "Herrera02";
 $db = "technologies lh";
 $conectar = mysqli_connect ($server, $user, $pass, $db) or die ("Error en la conexión");
 return $conectar;
}
?>