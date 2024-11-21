<?php
$servername = " mysql.webcindario.com "; // Cambia esto si tu servidor no está en localhost
$username = "sensores";        // Usuario de MySQL (por defecto es "root")
$password = "andrade.02";            // Contraseña de MySQL (por defecto es "")
$dbname = "sensores";      // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
