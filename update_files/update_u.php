<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (asegúrate de configurar la conexión correctamente)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Recibir los datos del formulario
    $id = $_POST["id"];
    $ubicaciont = $_POST["ubicaciont"];

    // var_dump($_POST);


    // Consulta SQL para actualizar la información del banco
    $sql = "UPDATE ubicaciones SET ubicaciont = '$ubicaciont' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'ubicaciones.php';</script>";
    } else {
        echo "Error al actualizar la información del banco: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si se accede a este archivo sin un formulario POST, redirigir o mostrar un mensaje de error.
    echo "Acceso no autorizado.";
}
?>
