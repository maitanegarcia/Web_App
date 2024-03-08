<?php 
/*http://localhost/TFG/Web%20Bilbao%20SportAirV1/conexion_db.php
*/
$conexion = mysqli_connect("localhost","root","","basededatos");

if($conexion){
    echo 'Conectada';
}else{
    echo 'No conectada';
}

?>