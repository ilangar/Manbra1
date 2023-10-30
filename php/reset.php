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

if (!isset($_SESSION['IDUsuario'])) 
{
    header("Location: ../html/inicioSesion.html"); 
    exit();
}

$idActividad = 1;

$sqlReset = "UPDATE Perfil SET fallidos = 0, acertados = 0 WHERE idUser = $idUser AND idActividad = $idActividad";
$mysqli->query($sqlReset);

header("Location: reconocer.php");

$mysqli->close();
?>