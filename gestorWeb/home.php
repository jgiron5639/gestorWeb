<?php
include 'conexion.php';
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit;
}
$sql = "SELECT publicaciones.*, usuarios.* FROM publicaciones LEFT JOIN usuarios ON publicaciones.correoElectronico = usuarios.correoElectronico WHERE publicaciones.correoElectronico = '$_SESSION[email]'";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de inicio</title>
    <link rel="stylesheet" href="CSS/home.css">
</head>
<body>
<header>
        <nav>
            <ul>
                <li>Bienvenido, <?php echo $_SESSION['email']; ?>!</li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <section>
    
    <div class="container"> 
    <button class="btn add-btn" onclick="irPagina()">Publicate</button>
    
       
    <table class="crud-table">
        
        <tr>
            <th>Titulo</th>
            <th>Subtitulo</th>
            <th>Cuerpo</th>
        </tr>
        <?php 
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                echo "<tr>
                        <td>" . $row["titulo"] ."</td>
                        <td>" . $row["subtitulo"]. "</td>
                        <td>" . $row["descripcion"] . "</td> 
                        <td>
                            <a href='editar.php?idPub=" . $row["idPub"] . "' class='btn edit-btn'>Editar</a><br><br>
                            <a href='borrar.php?idPub=" . $row["idPub"] . "' class='btn delete-btn'>Borrar</a>
                        </td>             
                </tr>";
            }
        }
        ?>
    </table>
    </div>
    </section>
    <script src="scriptHome.js"></script>
</body>
</html>