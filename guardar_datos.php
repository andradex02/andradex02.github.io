<?php
// Configura las variables para recibir los datos
$temp = $_GET['temp'] ?? null;
$hum = $_GET['hum'] ?? null;
$viento = $_GET['viento'] ?? null;
$lluvia = $_GET['lluvia'] ?? null;

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

// Si se recibieron todos los parámetros, guardar los datos en la base de datos
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
}

// Mostrar los datos almacenados
$sql = "SELECT * FROM datos_clima ORDER BY fecha DESC LIMIT 10"; // Obtén los 10 últimos registros
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar los datos de la base de datos
    while($row = $resultado->fetch_assoc()) {
        echo "Fecha: " . $row["fecha"] . " - Temp: " . $row["temperatura"] . "°C - Hum: " . $row["humedad"] . "% - Viento: " . $row["viento"] . " km/h - Lluvia: " . $row["lluvia"] . " mm<br>";
    }
} else {
    echo "No hay datos disponibles.";
}

// Cerrar la conexión
$conn->close();
?>
