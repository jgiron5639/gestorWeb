<?php
include 'conexion.php';
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit;
}

/*
// Verifica si la sesión está iniciada y si el correo electrónico está presente en la sesión
if(isset($_SESSION['correoElectronico'])) {
    // Obtén el correo electrónico de la sesión
    $correo = $_SESSION['correoElectronico'];
    
    // Prepara la consulta SQL para seleccionar los datos
    $sql = "SELECT * FROM usuarios WHERE correoElectronico = '$correo'"; // Reemplaza nombre_tabla con el nombre de tu tabla
    
    // Ejecuta la consulta
    $result = $conn->query($sql);
    
    // Verifica si hay resultados
    if ($result->num_rows > 0) {
        // Imprime los datos
        while($row = $result->fetch_assoc()) {
            // Aquí puedes mostrar los datos como desees
            echo "Nombre: " . $row["nombre"] . "<br>";
            echo "Correo: " . $row["correo"] . "<br>";
            // Agrega más campos según sea necesario
        }
    } else {
        echo "No se encontraron resultados.";
    }
    
    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    // Si el correo electrónico no está presente en la sesión, muestra un mensaje de error
    echo "La sesión no está iniciada o el correo electrónico no está presente en la sesión.";
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar</title>
    <link rel="stylesheet" href="CSS/home.css">
</head>
<body>
    <form action="enviarPublicacion.php" method="post">
        <label>Titulo
            <input type="text" name="titulo" id="titulo" Placeholder="Ingresa un titulo principal">
        </label>
        <label>Subtitulo
            <input type="text" name="subtitulo" id="subtitulo" placeholder="Ingresa un titulo secundario">
        </label>
        <label>Texto
            <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
        </label>
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <input type="submit" value="Enviar">
        <p><a href="home.php">Cancelar</a></p>
    </form>
</body>
</html>