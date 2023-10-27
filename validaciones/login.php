<?php

include('../conexion.php');
session_start();

$nombre = $_POST['nombre'];
$passwd = $_POST['contrasena'];

$sql = "SELECT * FROM Sesion WHERE correo = '$nombre' AND contrasenia = '$passwd'";

$resultado = $conn ->query($sql);

$row = $resultado->fetch_assoc();

if ($row['correo'] == $nombre && $row['contrasenia'] == $passwd) {
    if($row['tipo']=="admin"){

        header("Location: ../home.html");

    }else{
        header("Location: ../admin.html");
    }
    }else{
        header("Location:../index.html");
    }

if ($resultado->num_rows > 0) {
    # code...
    echo 'Usuario Correcto';
}else {
    echo 'El usuario no existe';
}

?>