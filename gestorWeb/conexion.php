<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestorweb";

// Crear una conexion
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexion
if ($conn->connect_error){
    die("conexion fallida: " . $conn->connect_error);
}

?>