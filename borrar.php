<?php
include("conexion.php");

// Verificar si se recibió un ID válido

    $id_trabajo = $_GET['id'];

    // Preparar la consulta de eliminación
    $queryEliminarTrabajo = "DELETE FROM trabajo WHERE ID_Trabajo = $id_trabajo";

    // Ejecutar la consulta
    if ($conn->query($queryEliminarTrabajo) === TRUE) {
        // Éxito en la eliminación
        echo "Registro eliminado con éxito.";
    } else {
        // Error en la eliminación
        echo "Error al eliminar el registro: " . $conn->error;
    }

?>