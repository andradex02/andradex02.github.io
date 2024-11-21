<?php
$servername = "localhost"; // Cambia esto si tu servidor no está en localhost
$username = "root";        // Usuario de MySQL (por defecto es "root")
$password = "";            // Contraseña de MySQL (por defecto es "")
$dbname = "sensores";      // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
