<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escueladb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$mensaje = "";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];

    // Prepared Statement (seguro)
    $stmt = $conn->prepare("INSERT INTO personas7 (nombre, apellido, edad) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $apellido, $edad);

    if ($stmt->execute()) {
        $mensaje = '<div class="alert alert-success">Alumno insertado correctamente</div>';
    } else {
        $mensaje = '<div class="alert alert-danger">Error al insertar</div>';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar alumno</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">Sistema Escuela</span>
        <a href="index.html" class="btn btn-light btn-sm">Volver</a>
    </div>
</nav>

<!-- Contenido -->
<div class="container mt-5">
    <div class="card shadow p-4">

        <h2 class="mb-4 text-center">Agregar alumno</h2>

        <?= $mensaje ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input type="number" name="edad" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.html" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>

        </form>

    </div>
</div>

</body>
</html>