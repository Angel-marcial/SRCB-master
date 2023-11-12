<?php
//aun no esta terminado
include ("conexion.php");

$id = $_GET('id');

$eliminar = "DELETE FRPM ponente ID_Ponente = '$id'";

$Reliminar = mysqul_query($conexion, eliminar);
