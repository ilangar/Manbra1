<?php
    $_ENV = parse_ini_file("../.env");
    $mysqli = mysqli_init();
    $mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
    $mysqli->real_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

    if ($mysqli->connect_error)  
    {
        die("Conexión fallida: " . $mysqli->connect_error);
    }

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 0) 
    {
        $mensajeAviso = "Usuario o contraseña incorrectos";
        echo $mensajeAviso;
    } 
    else 
    {
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['IDUsuario']=$row['idUser'];
        $result->free_result();
        //echo $_SESSION['IDUsuario'];
        header("Location: ../html/principal.php");
        exit();
    }

    $mysqli->close();
?>