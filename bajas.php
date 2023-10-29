<?php

include("conexion.php");
$con = conexion();

$id=$_GET[""];

$sql="DELETE FROM users WHERE id='$'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ponientes.php");
}else{

}