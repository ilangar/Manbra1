
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "aws.connect.psdb.cloud";
    $username = "07xwqnuijphsbqoab0k4";
    $password = "pscale_pw_JXzLN6enLWTCNrN0STxPlOH5qfDa46QdrDv7xaFcFum";
    $dbname = "manbra";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO Usuarios (nombre, apellido, usuario, contraseña) VALUES ('$nombre', '$apellido', '$usuario', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar: " . $conn->error;
    }

    $conn->close();
}
?>