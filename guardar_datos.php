<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensores"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibieron los datos mediante GET
if (isset($_GET['cod_sensor']) && isset($_GET['lectura']) && isset($_GET['fecha'])) {
    $cod_sensor = intval($_GET['cod_sensor']); // Convertir a entero para mayor seguridad
    $lectura = htmlspecialchars($_GET['lectura']); // Limpiar para evitar inyecciones
    $fecha = $_GET['fecha'];

    // Insertar datos en la tabla "lectura"
    $sql = "INSERT INTO lectura (cod_sensor, lectura, fecha) VALUES ('$cod_sensor', '$lectura', '$fecha')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Faltan parámetros en la solicitud.";
}

// Cerrar la conexión
$conn->close();
?>
