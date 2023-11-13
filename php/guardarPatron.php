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

$patron = isset($_POST['patron']) ? $_POST['patron'] : '';

if (!empty($patron)) 
{
    $sql = "INSERT INTO Musicogramas (idUser, patron) VALUES ('$idUser', '$patron')";
    if ($mysqli->query($sql)) 
    {
        $guardadoExitoso = "Patrón guardado correctamente";
        echo $guardadoExitoso;
    } 
    else 
    {
        $guardadoExitoso = "Error al guardar el patrón" . $mysqli->error;
        echo $guardadoFracasado;
    }
} 

$mysqli->close();
?>
