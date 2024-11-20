<?php
require_once 'config/db.php';

if (isset($_GET['temp']) && isset($_GET['hum']) && isset($_GET['viento']) && isset($_GET['lluvia'])) {
    // Obtener los datos del GET
    $temp = $_GET['temp'];
    $hum = $_GET['hum'];
    $viento = $_GET['viento'];
    $lluvia = $_GET['lluvia'];
    $fecha = date("Y-m-d H:i:s"); // Fecha actual

    // Crear la conexión a la base de datos
    $db = new DB();
    $conn = $db->conectar();

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO datos_clima (fecha, temperatura, humedad, viento, lluvia) 
            VALUES ('$fecha', '$temp', '$hum', '$viento', '$lluvia')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos recibidos correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Datos faltantes.";
}
?>
