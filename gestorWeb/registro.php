<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correoElectronico, contra) VALUES ('$name', '$username', '$password')";
    
    try {
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registro exitoso'); window.location.href='index.php';</script>";
        } else {
            throw new Exception("Registro invalido, correo electronico existente.");
        }
    } catch (mysqli_sql_exception $e){
        if ($e->getCode() == 1062){
            echo "<script>alert('Registro invalido, correo electronico existente.'); window.location.href='registro.php';</script>";
        }else{
            echo "<script>alert('Error al registrar el usuario.'); window.location.href='registro.php';</script>";
        }
    }}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <form action="" method="post">
    <h2>Registro</h2>
        <label>Nombre:</label><br>
        <input type="text" name="name" required><br>
        <label>Usuario:</label><br>
        <input type="text" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit">Registrarse</button>
        <br><br>
    <a href="index.php">Inicia sesión</a>
    </form>
</body>
</html>