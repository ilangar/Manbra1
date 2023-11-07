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

$idActividad = 2;
$ronda = 0;
$rondas = $ronda + $_POST['ronda'];
$rondasFinal = $rondas;

$sql = "SELECT ronda FROM Perfil WHERE idUser = $idUser AND idActividad = $idActividad"
$puntajeAnterior = $_SESSION['ronda']

if ($rondasFinal > ronda)
{
$sqlMayor = "UPDATE Perfil SET ronda = $rondasFinal WHERE idUser = $idUser AND idActividad = $idActividad"; 
$mysqli->query($sqlMayor);
}
?>