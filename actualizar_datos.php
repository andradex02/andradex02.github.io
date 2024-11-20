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

// Obtener los últimos 10 registros de la base de datos
$sql = "SELECT * FROM datos_clima ORDER BY fecha DESC LIMIT 10";
$resultado = $conn->query($sql);

// Comprobar si hay datos
if ($resultado->num_rows > 0) {
    // Mostrar los datos
    while($row = $resultado->fetch_assoc()) {
        echo "<p><strong>Fecha:</strong> " . $row["fecha"] . "<br>";
        echo "<strong>Temperatura:</strong> " . $row["temperatura"] . "°C<br>";
        echo "<strong>Humedad:</strong> " . $row["humedad"] . "%<br>";
        echo "<strong>Viento:</strong> " . $row["viento"] . " km/h<br>";
        echo "<strong>Lluvia:</strong> " . $row["lluvia"] . " mm</p>";
    }
} else {
    echo "No hay datos disponibles.";
}

// Cerrar la conexión
$conn->close();
?>
