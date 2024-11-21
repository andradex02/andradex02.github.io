<?php
include 'db.php';

// Consultar los últimos 10 datos
$sql = "SELECT valor, DATE_FORMAT(fecha, '%H:%i') as hora FROM datos_sensor ORDER BY fecha DESC LIMIT 10";
$result = $conn->query($sql);

// Preparar los datos para el JSON
$data = ["labels" => [], "data" => []];
while ($row = $result->fetch_assoc()) {
    $data["labels"][] = $row["hora"];  // Hora del dato
    $data["data"][] = $row["valor"];  // Valor del sensor
}

// Devolver como JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
