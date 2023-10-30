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


$intentosFallidos = isset($_POST['intentosFallidos']) ? $_POST['intentosFallidos']:0;
$intentosAcertados = isset($_POST['intentosAcertados']) ? $_POST['intentosAcertados']:0;

$idActividad = 1;

if ($intentosFallidos > 0) 
{
    $sqlFallidos = "UPDATE Perfil SET fallidos = fallidos + $intentosFallidos WHERE idUser = $idUser AND idActividad = $idActividad";
    $mysqli->query($sqlFallidos);
}
if ($intentosAcertados > 0) 
{
    $sqlAcertados = "UPDATE Perfil SET acertados = acertados + $intentosAcertados WHERE idUser = $idUser AND idActividad = $idActividad";
    $mysqli->query($sqlAcertados);
}

$sqlScoring = "SELECT acertados,fallidos FROM Perfil WHERE idUser = $idUser AND idActividad = $idActividad";
$resultados=$mysqli->query($sqlScoring);
$data=array();
while ($registroActividad = $resultados->fetch_assoc()) 
            {
                $data['result']=$registroActividad;
            }
echo json_encode($data);

$mysqli->close();

?>