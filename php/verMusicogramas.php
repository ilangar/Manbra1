<?php
session_start();
$_ENV = parse_ini_file("../.env");
$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
$mysqli->real_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

if ($mysqli->connect_error)  
{
    die("Conexión fallida: " . $mysqli->connect_error);
}

$sql = "SELECT idUser FROM usuarios WHERE usuario";
$idUser = $_SESSION['IDUsuario'];

//$verMusicograma = 
?>

<!DOCTYPE html>
<head>

</head>
<body>
    
</body>
</html>