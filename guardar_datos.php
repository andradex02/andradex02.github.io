<?php
// Configuración para la conexión a la base de datos
require_once 'config/db.php';  // Asegúrate de que el archivo de conexión esté en la carpeta correcta

// Crear la conexión
$db = new DB();
$conn = $db->conectar();

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los últimos 10 registros de la base de datos
$sql = "SELECT * FROM datos_clima ORDER BY fecha DESC LIMIT 10";
$resultado = $conn->query($sql);

// Comprobar si hay datos
if ($resultado->num_rows > 0) {
    // Mostrar los datos
    while($row = $resultado->fetch_assoc()) {
        echo "<p>Fecha: " . $row["fecha"] . "</p>";
        echo "<p>Temperatura: " . $row["temperatura"] . "°C</p>";
        echo "<p>Humedad: " . $row["humedad"] . "%</p>";
        echo "<p>Viento: " . $row["viento"] . " km/h</p>";
        echo "<p>Lluvia: " . $row["lluvia"] . " mm</p><hr>";
    }
} else {
    echo "No hay datos disponibles.";
}

// Cerrar la conexión
$conn->close();
?>
