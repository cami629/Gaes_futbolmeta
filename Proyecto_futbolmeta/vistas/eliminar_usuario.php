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

// Verifica si se ha pasado un ID de usuario para eliminar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = intval($_GET['id']);

    try {
        // Elimina el usuario de la tabla usuario
        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_usuario' => $id_usuario]);

        // Redirige al panel de control después de la eliminación
        header("Location: panelDeControl.php");
        exit;
    } catch (Exception $e) {
        die("Error al eliminar el usuario: " . $e->getMessage());
    }
} else {
    // Si no se pasa un ID, redirige al panel de control
    header("Location: panelDeControl.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
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
        <h1>Eliminar Usuario</h1>
        <p>El usuario ha sido eliminado exitosamente.</p>
        <a href="panelDeControl.php" class="btn btn-primary">Regresar al Panel de Control</a>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
