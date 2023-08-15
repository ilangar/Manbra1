
<?php

    $mysqli = mysqli_init();
    $mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
    $mysqli->real_connect($_ENV["aws.connect.psdb.cloud"], $_ENV["d7r7ihtxp2q5di8xlmop"], $_ENV["pscale_pw_CjAGcVTOqgxwpDN5mIs5Cf2yhXoaqUzAcQG0HA5HF3s"], $_ENV["manbra"]);
    
    if ($mysqli->connect_error) 
    {
        die("Connection failed: " . $mysqli->connect_error);   
    }
    
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO Usuarios (nombre, apellido, usuario, contrasena) VALUES ('$nombre', '$apellido', '$usuario', '$contrasena')";
    
    echo $sql;

    $mysqli->close();
?>