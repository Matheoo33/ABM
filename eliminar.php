<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escueladb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si viene un ID por GET, eliminarlo
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $conn->prepare("DELETE FROM personas7 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Traer datos actualizados
$sql = "SELECT id, nombre, apellido, edad FROM personas7";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar alumnos</title>

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

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">Eliminar alumnos</h2>

        <table class="table table-striped table-hover text-center">
            <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $fila["id"] ?></td>
                        <td><?= $fila["nombre"] ?></td>
                        <td><?= $fila["apellido"] ?></td>
                        <td><?= $fila["edad"] ?></td>
                        <td>
                            <a href="eliminar.php?id=<?= $fila["id"] ?>" 
                               class="btn btn-danger btn-sm">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

</div>

</body>
</html>

<?php $conn->close(); ?>