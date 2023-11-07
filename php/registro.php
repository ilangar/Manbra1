<?php
$_ENV = parse_ini_file("../.env");
$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
$mysqli->real_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$checkUsuario = "SELECT usuario FROM Usuarios WHERE usuario = '$usuario'";
$resultCheck = $mysqli->query($checkUsuario);

if ($resultCheck) 
{
    if ($resultCheck->num_rows > 0) 
    {
        $mensajeAviso = "Ya existe un usuario con ese nombre";
        echo $mensajeAviso;
    } 
    else 
    {
        $sql = "INSERT INTO Usuarios (nombre, apellido, usuario, contrasena) VALUES ('$nombre', '$apellido', '$usuario', '$contrasena')";

        if ($mysqli->query($sql) === TRUE) 
        {
            $idUser = $mysqli->insert_id;

            // Recupera las actividades disponibles
            $sqlActividad = "SELECT idActividad FROM Actividades";
            $result_actividad = $mysqli->query($sqlActividad);
 
            while ($registroActividad = $result_actividad->fetch_assoc()) 
            {
                $idActividad = $registroActividad["idActividad"];
                $sqlPerfil = "INSERT INTO Perfil (idUser, idActividad, fallidos, acertados, ronda) VALUES ('$idUser', '$idActividad', 0, 0, 0)";
                if ($mysqli->query($sqlPerfil) !== TRUE) 
                {
                    echo "Error al insertar en Perfil";
                }
            }
 
             $result_actividad->free_result();
             echo "registrado";
        } 
        else 
        {
            echo "Error al registrar: " . $mysqli->error;
        }
    }
}
else 
{
    echo "Error en la consulta: " . $mysqli->error;
}

$mysqli->close();
?>