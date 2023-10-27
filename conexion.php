<?php
$host = "localhost:3308";
$usuario = "root";
$contrasena = "";
$base_datos = "bdelfin";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);
mysqli_set_charset($conn, "utf8");
