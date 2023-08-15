
<?php
    $hostname = $_ENV['aws.connect.psdb.cloud'];
    $dbName = $_ENV['manbra'];
    $username = $_ENV['d7r7ihtxp2q5di8xlmop'];
    $password = $_ENV['pscale_pw_CjAGcVTOqgxwpDN5mIs5Cf2yhXoaqUzAcQG0HA5HF3s'];
    
    $mysqli = mysqli_init();
    $mysqli->ssl_set(NULL, NULL, '/etc/ssl/certs/ca-certificates.crt', NULL, NULL);
    $mysqli->real_connect($hostname, $username, $password, $dbName, $port);
    
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