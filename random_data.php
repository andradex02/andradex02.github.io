<?php
session_start(); // Iniciar sesión

// Establecer la zona horaria de Colombia
date_default_timezone_set('America/Bogota');

// Lista fija de nombres de plantas
$plantas = ["Aloe Vera", "Cactus", "Rosa"];

// Revisar si ya existen datos en la sesión
if (isset($_SESSION['sensor_data']) && time() - $_SESSION['last_update'] < 60) {
    // Usar los datos existentes si no han pasado 60 segundos
    $data = $_SESSION['sensor_data'];
} else {
    // Generar nuevos datos si no existen o han pasado 60 segundos
    $data = [
        "labels" => [],
        "temperaturas" => [],
        "calidad_aire" => [],
        "humedad_suelo" => [],
        "plantas" => $plantas
    ];

    // Generar datos para las 3 plantas
    for ($i = 0; $i < count($plantas); $i++) {
        $data["labels"][] = date('Y-m-d H:i:s'); // Hora actual en formato militar
        $data["temperaturas"][] = rand(20, 40) + (rand(0, 99) / 100); // Valor aleatorio entre 20.00 y 40.99
        $data["calidad_aire"][] = rand(50, 100) + (rand(0, 99) / 100); // Calidad de aire entre 50.00 y 100.99
        $data["humedad_suelo"][] = rand(10, 80) + (rand(0, 99) / 100); // Humedad entre 10.00 y 80.99
    }

    // Guardar los datos en la sesión
    $_SESSION['sensor_data'] = $data;
    $_SESSION['last_update'] = time();
}

// Enviar como respuesta JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
