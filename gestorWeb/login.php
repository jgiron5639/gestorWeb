<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM usuarios WHERE correoElectronico='$username' AND contra='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['email'] = $username;
        header("Location: home.php");
        exit;
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
