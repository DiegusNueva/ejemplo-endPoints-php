<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$contraseña = 'Ereba555'; // Reemplaza con tu contraseña
$base_de_datos = 'pruebaTunivers';

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos de la solicitud POST
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];

    // Consulta SQL INSERT INTO
    $sql = "INSERT INTO personas (nombre, edad, direccion) VALUES ('$nombre', $edad, '$direccion')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conexion->error;
    }
} else {
    echo "No se ha enviado una solicitud POST.";
}

// Cerrar la conexión
$conexion->close();
?>
