<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Deja esto en blanco si estás usando la contraseña por defecto
$database = "olimpiadas";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recopila los datos del formulario
$tiporeporte = $_POST["tipo_reporte"];
$contenidoreporte = $_POST["contenido_reporte"];
$idarea = $_POST ["ID_Area"];
$fechacreacion = $_POST ["fecha_creacion"];

$sql = "INSERT INTO Reportes(TipoReporte, ContenidoReporte, ID_Area, FechaCreacionReporte)
            VALUES ('$tiporeporte', '$contenidoreporte', '$idarea', '$fechacreacion')";


            if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
    header("Location: reportes.html"); // Redirige a la página principal
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>