<?php


$servername = "localhost";
$username = "root"; // Cambiar por tu nombre de usuario
$password = ""; // Cambiar por tu contraseña
$dbname = "escueladb"; // Cambiar por el nombre de tu base de datos



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Conexión fallida: " . $conn->connect_error);
}



// Dato a insertar
$nombre = "Juan ";
$apellido = "Perez ";

// Insertar directamente con query
$sql = "INSERT INTO personas7 (nombre) VALUES ('$nombre'), (apellido) VALUES ('$apellido')";


if ($conn->query($sql)) {
    echo "Dato insertado correctamente.";
} else {
    echo "Error al insertar: " . $conn->error;
}

$conn->close();