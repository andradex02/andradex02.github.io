<?php
// Configuración de la base de datos
$servername = "127.0.0.1"; // Cambia esto según tu servidor
$username = "root"; // Tu usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
$dbname = "clima"; // El nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se reciben los datos
if (isset($_GET['temp'], $_GET['hum'], $_GET['viento'], $_GET['lluvia'])) {
    $temp = $_GET['temp'];
    $hum = $_GET['hum'];
    $viento = $_GET['viento'];
    $lluvia = $_GET['lluvia'];

    // Consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO datos_clima (fecha, temperatura, humedad, viento, lluvia) 
            VALUES (NOW(), ?, ?, ?, ?)";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("dddd", $temp, $hum, $viento, $lluvia);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Datos guardados correctamente.";
        } else {
            echo "Error al guardar los datos: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }
} else {
    echo "No se recibieron datos.";
}

// Cerrar la conexión
$conn->close();
?>
