<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escueladb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, edad, apellido FROM personas7";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de alumnos</title>

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
            <h2 class="mb-4 text-center">Listado de alumnos</h2>

            <?php if ($resultado->num_rows > 0): ?>
                
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($fila = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?= $fila["id"] ?></td>
                                <td><?= $fila["nombre"] ?></td>
                                <td><?= $fila["apellido"] ?></td>
                                <td><?= $fila["edad"] ?></td>
                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>

            <?php else: ?>
                <div class="alert alert-warning text-center">
                    No hay resultados
                </div>
            <?php endif; ?>

        </div>

    </div>

</body>
</html>

<?php $conn->close(); ?>
