<?php
    $mysqli = mysqli_init();
    $mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
    $mysqli->real_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
   
    if ($mysqli->connect_error)
    {
        die("Connection failed: " . $mysqli->connect_error);
    }
    else 
    {
        die("Connected successfully");
    }
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "INSERT INTO Usuarios (nombre, apellido, usuario, contrasena) VALUES ('$nombre', '$apellido', '$usuario', '$contrasena')";
    
    echo $sql;

    $mysqli->close();
?>