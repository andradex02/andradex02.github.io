<?php
include('config.php');
session_start();

if (isset($_POST['register'])) {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Preparar la consulta
    $query = $connection->prepare("INSERT INTO usuarios(NOMBRE, USERNAME, PASSWORD) VALUES (:nombre, :username, :password_hash)");
    $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);

    // Ejecutar la consulta
    $result = $query->execute();
    if ($result) {
        header('Location: login.php'); // Redirigir a la página de inicio de sesión
        exit;
    } else {
        echo '<p class="error">¡Algo salió mal!</p>';
    }
}
?>