<?php
$servername = "b3xoi93axiyfc4ylpz1k-mysql.services.clever-cloud.com:3306"; // Cambia esto si tu servidor no está en localhost
$username = "uhlnuouvu8r9rv6i";        // Usuario de MySQL (por defecto es "root")
$password = "V0JTbJdTHuhT9yrx73JY";            // Contraseña de MySQL (por defecto es "")
$dbname = "b3xoi93axiyfc4ylpz1k";      // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
