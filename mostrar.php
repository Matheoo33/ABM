<?php

$servername = "localhost";
$username = "root"; // Cambiar por tu nombre de usuario
$password = ""; // Cambiar por tu contraseña
$dbname = "bcescuela"; // Cambiar por el nombre de tu base de datos



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Conexión fallida: " . $conn->connect_error);
}



$sql = "SELECT id, nombre, edad, apellido FROM personas7";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"] . " - Nombre: " . $fila["nombre"] . " - Edad: " . $fila["edad"] . " - Apellido: " . $fila["apellido"] . "<br>";
    }
} 
else {
    echo "0 resultados";
}

$conn->close();
