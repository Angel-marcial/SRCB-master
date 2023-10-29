<?php
//configurar su maquina para ocupar el puerto necesario para su ejecucion por lo regular es 3306
$host = "localhost:3306";
$usuario = "root";
$contrasena = "";
$base_datos = "bdelfin";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);
mysqli_set_charset($conn, "utf8");