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
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$fechaNacimiento = $_POST["fechaNacimiento"];
$genero = $_POST["genero"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$dni = $_POST["dni"];
$diagnostico = $_POST["diagnostico"];
$enfermero = $_POST["enfermero"];


// Inserta los datos en la tabla
$sql = "INSERT INTO pacientes (nombre, apellido, FechaNacimiento, genero, direccion, telefono, dni, EnfermedadDiagnostico, ID_EnfermeroAsignado)
        VALUES ('$nombre', '$apellido', '$fechaNacimiento', '$genero', '$direccion', '$telefono', '$dni', '$diagnostico', '$enfermero')";



if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
    header("Location: info.html"); // Redirige a la página principal
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>