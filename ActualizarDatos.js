<script>
    async function actualizarDatos() {
        try {
            const response = await fetch("guardar_datos.php");
            if (response.ok) {
                const data = await response.text();
                document.getElementById("datos").innerHTML = data; // Actualiza el contenido de la sección "datos"
            } else {
                console.error("Error en la respuesta del servidor");
                document.getElementById("datos").innerHTML = "No se pudieron cargar los datos.";
            }
        } catch (error) {
            console.error("Error al cargar los datos:", error);
            document.getElementById("datos").innerHTML = "Error al conectar con el servidor.";
        }
    }

    // Llama automáticamente a la función al cargar la página
    window.onload = actualizarDatos;

    // Opcional: Llama automáticamente cada 10 segundos
    setInterval(actualizarDatos, 10000); // Intervalo en milisegundos (10 segundos)
</script>
