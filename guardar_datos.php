<?php
require_once 'config/db.php';  // Asegúrate de tener la configuración de la base de datos en este archivo

// Conexión a la base de datos
$db = new DB();
$conexion = $db->conectar();

// Verificar si los datos están presentes en la solicitud POST
if (isset($_POST['temp']) && isset($_POST['hum']) && isset($_POST['viento']) && isset($_POST['lluvia'])) {
    $temp = $_POST['temp'];
    $hum = $_POST['hum'];
    $viento = $_POST['viento'];
    $lluvia = $_POST['lluvia'];

    // Insertar los datos en la base de datos
    $query = "INSERT INTO sensores (temperatura, humedad, viento, lluvia) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("dddd", $temp, $hum, $viento, $lluvia);

    if ($stmt->execute()) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Faltan datos para guardar.";
}

$conexion->close();
?>
