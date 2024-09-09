<?php
include 'conexion.php';
session_start();

if(isset($_GET['idPub'])) {
    $id = $_GET['idPub'];

    // Verifica si se ha enviado la confirmación de borrado
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        // Elimina el registro de la base de datos
        $sql = "DELETE FROM publicaciones WHERE idPub = $id";
        if ($conn->query($sql) === TRUE) {
            // Redirige a alguna página o muestra un mensaje de éxito
            header("Location: home.php");
            exit;
        } else {
            echo "Error al intentar borrar el registro: " . $conn->error;
        }
    } else {
        // Muestra el mensaje de confirmación antes de borrar
        echo "<script>
            var confirmDelete = confirm('¿Estás seguro de que quieres borrar este registro?');
            if(confirmDelete) {
                window.location.href = 'borrar.php?idPub=$id&confirm=true';
            } else {
                window.location.href = 'home.php'; // Otra página de destino si el usuario cancela
            }
        </script>";
    }
} else {
    echo "ID de registro no proporcionado.";
}
?>
