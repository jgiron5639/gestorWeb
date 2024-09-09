<?php
include 'conexion.php';
session_start();

if(!isset($_GET['idPub']) || empty($_GET['idPub'])){
    //header("location: home.php");
    echo "Actualizado correctamente";
}

$id = $_GET['idPub'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $descripcion = $_POST['descripcion'];
    $correoElectronico = $_POST['correoElectronico'];

    $sql = "UPDATE publicaciones SET titulo='$titulo',subtitulo='$subtitulo',descripcion='$descripcion',correoElectronico='$correoElectronico' WHERE idPub = $id";

    if ($conn->query($sql) === TRUE){
        header("Location: home.php");
        exit;
    }else{
        echo "Error al actualizar la publicación: " . $conn->error;
    }
}
$sql_select = "SELECT * FROM publicaciones WHERE idPub=$id";
$resultado = $conn->query($sql_select);

if ($resultado->num_rows > 0){
    $row = $resultado->fetch_assoc();
    $titulo = $row['titulo'];
    $subtitulo = $row['subtitulo'];
    $descripcion = $row['descripcion'];
    $correoElectronico = $row['correoElectronico'];
}else{
    echo "No se encontro la publicación";
    exit;
}
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?idPub=$id"); ?>" method="post">
        <label>Titulo
            <input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
        </label>
        <label>Subtitulo
            <input type="text" name="subtitulo" id="subtitulo" value="<?php echo $subtitulo; ?>" >
        </label>
        <label>Texto
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
        </label>

        <input type="email" style="display:none" name="correoElectronico" id="correoElectronico" value="<?php echo $correoElectronico ?>">
        <input type="submit" value="Guardar Cambios">
        <p><a href="home.php">Cancelar</a></p>
    </form>
    
</body>
</html>