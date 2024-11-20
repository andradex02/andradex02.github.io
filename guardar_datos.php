<?php
// Configura las variables para recibir los datos
$temp = $_GET['temp'] ?? null;
$hum = $_GET['hum'] ?? null;
$viento = $_GET['viento'] ?? null;
$lluvia = $_GET['lluvia'] ?? null;

// Guarda los datos en un archivo o base de datos
$datosArchivo = "datos.txt";
if ($temp && $hum && $viento && $lluvia) {
    $linea = date("Y-m-d H:i:s") . ", Temp: $temp°C, Hum: $hum%, Viento: $viento km/h, Lluvia: $lluvia mm\n";
    file_put_contents($datosArchivo, $linea, FILE_APPEND);
}

// Muestra los datos almacenados
if (file_exists($datosArchivo)) {
    $contenido = file_get_contents($datosArchivo);
    echo nl2br($contenido);
} else {
    echo "No hay datos disponibles.";
}
?>
