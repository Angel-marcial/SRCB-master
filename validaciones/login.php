<?php

include('../conexion.php');
session_start();

$nombre = $_POST['nombre'];
$passwd = $_POST['contrasena'];

$sql = "SELECT * FROM Sesion WHERE correo = '$nombre' AND contrasenia = '$passwd'";

$resultado = $conn ->query($sql);

$row = $resultado->fetch_assoc();

if ($row['correo'] == $nombre && $row['contrasenia'] == $passwd) 
{
    if($row['tipo']=="admin")
    {
        header("Location: ../index.html");

    }else if($row['tipo']=="mod")
    {
        header("Location: ../index.html");
    }
    }else
    {
        header("Location:../ponentes.php");
    }

if ($resultado->num_rows > 0) 
{
    echo 'Usuario Correcto';
}else 
{
    echo 'El usuario no existe';
}

?>