<?php
$_ENV = parse_ini_file("../.env");
$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
$mysqli->real_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO Usuarios (nombre, apellido, usuario, contrasena) VALUES ('$nombre', '$apellido', '$usuario', '$contrasena')";

if ($mysqli->query($sql) === TRUE) 
{
    $idUser = $mysqli->insert_id;
    
    $sqlActividad = "SELECT idActividades FROM Actividades";
    $result_actividad = $mysqli->query($sqlActividad);
    
    while ($registroActividad = $result_actividad->fetch_assoc()) 
    {
        $idActividad = $registroActividad["idActividades"];
        $i = 1;
        while ($i <= 5) 
        {
            $sqlPerfil = "INSERT INTO Perfil (intentosFallados, intentosAcertados, idActividad, idUser) VALUES (NULL, NULL, '$idActividad', '$idUser')";
            $mysqli->query($sqlPerfil);
        
            $sqlMusicogramas = "INSERT INTO Musicogramas (idUser, patron) VALUES ('$idUser', NULL)";
            $mysqli->query($sqlMusicogramas)
            $i++;
        }
    }
      
    $result_actividad->free_result();
    header("Location: ../html/inicioSesion.html");
    exit();
} 
else 
{
    echo "Error al registrar: " . $mysqli->error;
}

$mysqli->close();
?>