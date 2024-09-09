<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE correoElectronico='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['contra'])) {
            $_SESSION['email'] = $username;
            header("Location: home.php");
            exit;
        } else {
            echo "<script>alert('Nombre de usuario o contraseña incorrectos.');</script>";
        }
    } else {
        echo "<script>alert('Nombre de usuario o contraseña incorrectos.');</script>";
    }
}
?>
<!--
<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head> 
<body>
    <h2>Iniciar Sesión</h2>
    <form action="" method="post">
        <label>Usuario:</label><br>
        <input type="text" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <br>
    <a href="registro.php">Registrarse</a>
</body>
</html>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <form action="" method="post">
    <h2>Iniciar Sesión</h2>
        <label>Usuario:</label><br>
        <input type="text" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit">Iniciar Sesión</button>
        <br><br>
    <a href="registro.php">Registrarse</a>
    </form>
    
</body>
</html>