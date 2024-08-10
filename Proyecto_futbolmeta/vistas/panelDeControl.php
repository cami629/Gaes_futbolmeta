<?php
include('../config/db.php'); // Incluye el archivo de configuración de la base de datos
require_once('../controladores/Controller.php'); // Incluye el archivo del controlador principal
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Recupera el nombre del usuario logueado
$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT nom_usuario FROM usuario WHERE id_usuario = :usuario_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['usuario_id' => $usuario_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
$nombre_usuario = htmlspecialchars($usuario['nom_usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="../publico/css/bootstrap.min.css" rel="stylesheet">
    <script src="../publico/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .user-icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }
        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5 pt-5">
        <div class="user-info">
            <i class="fas fa-user user-icon"></i>
            <span>Hola, <?php echo $nombre_usuario; ?></span>
        </div>
        <h1>Bienvenido al Panel de Control</h1>
        <!-- Aquí va el contenido del panel de control -->
        
        <h2>Gestión de Usuarios</h2>
        <a href="crear_usuario.php" class="btn btn-primary">Crear Usuario</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM usuario";
                $stmt = $pdo->query($sql);
                $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($usuarios as $usuario) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($usuario['id_usuario']) . '</td>';
                    echo '<td>' . htmlspecialchars($usuario['nom_usuario']) . '</td>';
                    echo '<td>' . htmlspecialchars($usuario['cor_usuario']) . '</td>';
                    echo '<td>';
                    echo '<a href="editar_usuario.php?id=' . htmlspecialchars($usuario['id_usuario']) . '" class="btn btn-warning">Editar</a> ';
                    echo '<a href="eliminar_usuario.php?id=' . htmlspecialchars($usuario['id_usuario']) . '" class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de eliminar este usuario?\')">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
