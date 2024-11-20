<?php
class DB {
    private $host = "localhost";   // Cambia esto si tu base de datos está en otro servidor
    private $db_name = "clima";  // Nombre de tu base de datos
    private $username = "datos_clima;   // Tu nombre de usuario para la base de datos
    private $password = "contraseña";  // Tu contraseña para la base de datos
    private $conn;

    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            
            // Comprobar si hubo un error en la conexión
            if ($this->conn->connect_error) {
                die("Conexión fallida: " . $this->conn->connect_error);
            }

            // Establecer el conjunto de caracteres a UTF-8
            $this->conn->set_charset("utf8");

        } catch (Exception $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }

        return $this->conn;
    }

    public function cerrar() {
        if ($this->conn != null) {
            $this->conn->close();
        }
    }
}
?>
