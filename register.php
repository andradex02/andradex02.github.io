<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIRE 360</title>
    <link rel="shortcut icon" href="img/forest tree.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <style type="text/css">
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    
    form {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    label {
        display: block;
        margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="password"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }
    
    a {
        text-decoration: none;
        color: #007bff;
    }
    
    a:hover {
        text-decoration: underline;
    }
    
    
    
        </style> 
</head>

<body>
    <header>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Acerca de</a>
            <a href="#">Portafolio</a>
            <a href="#">Servicios</a>
            <a href="#">Contacto</a>
        </nav>
        <section class="textos-header">
            <h1>Registrate</h1>
            <h2>Es facíl y rapido.</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
   
        
    
    <form method="post" action="registration.php" name="signup-form">
    <label for="nombre">Nombre completo:</label><br>
    <input type="text" id="nombre" name="nombre" pattern="[a-zA-Z0-9\s]+" required><br><br>
    
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" pattern="[a-zA-Z0-9]+" required><br><br>
    
    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <center>
        <button type="submit" name="register" value="register">Registrarse</button>
    </center>
</form>
</h2>
    <footer>
        
        <h2 class="titulo-final">&copy; Jorge Andrade | Samuel Gomez | Andres Agreda</h2>
    </footer>
</body>

</html>