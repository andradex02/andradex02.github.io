<?php
// Parámetros de la base de datos
$servidor = "localhost";  // o la IP del servidor de base de datos
$usuario = "root";        // tu usuario de MySQL
$clave = "";             // tu contraseña de MySQL
$baseDeDatos = "clima";  // nombre de la base de datos

// Crear la conexión a la base de datos
$conn = new mysqli($servidor, $usuario, $clave, $baseDeDatos);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los datos enviados desde el formulario o API
$temp = $_GET['temp'] ?? null;
$hum = $_GET['hum'] ?? null;
$viento = $_GET['viento'] ?? null;
$lluvia = $_GET['lluvia'] ?? null;

// Si se reciben los datos correctamente, insertarlos en la base de datos
if ($temp && $hum && $viento && $lluvia) {
    $fecha = date("Y-m-d H:i:s");

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO datos_clima (fecha, temperatura, humedad, viento, lluvia) 
            VALUES ('$fecha', $temp, $hum, $viento, $lluvia)";
    
    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
} else {
    echo "Faltan datos para guardar.";
}

// Cerrar la conexión
$conn->close();
?>
