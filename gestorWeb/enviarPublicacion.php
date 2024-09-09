<?php 
include 'conexion.php';

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$texto = $_POST['texto'];
$email = $_POST['email'];

$sql = "INSERT INTO publicaciones(titulo, subtitulo, descripcion, correoElectronico) VALUES ('$titulo','$subtitulo','$texto','$email')";

if ($conn->query($sql) === TRUE){
    header("Location: home.php");
}else{
    echo "Error al insertar datos: " . $conn->error;
}
?>