<?php

include("conexion.php");
$con = conexion();

$id=$_GET["Ponente."];

$sql="DELETE FROM users WHERE id='$'Ponente.";
$query = mysqli_query($con, $sql);

/*regresa o refresca a ponientes*/
if($query){
    Header("Location: ponientes.php");
}else{

}