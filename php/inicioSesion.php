<?php
$_ENV = parse_ini_file("../.env");
$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
$mysqli->real_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

if ($mysqli->connect_error)  
{
    die("Conexión fallida: " . $mysqli->connect_error);
}

session_start();
$sql = "SELECT idUser FROM usuarios";
$idUser = $_SESSION['idUser'];
$_SESSION['idUser'] = $idUser;

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT idUser FROM Usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$result = $mysqli->query($sql);

if ($result->num_rows == 1) 
{
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['IDUsuario']=$row['idUser'];
    $result->free_result();
    exit();
} 
else 
{    
    $mensajeAviso = "Usuario o contraseña incorrectos";
    echo $mensajeAviso;
}

$mysqli->close();
?>