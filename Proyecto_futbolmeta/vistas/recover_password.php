<?php
include('../config/db.php'); // Incluye el archivo de configuración de la base de datos
session_start();

// Maneja la recuperación de la contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doc_usuario = $_POST['doc_usuario'];
    $new_password = $_POST['new_password'];

    // Busca el usuario por documento de identidad
    $sql = "SELECT * FROM usuario WHERE doc_usuario = :doc_usuario LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':doc_usuario', $doc_usuario, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Actualiza la contraseña del usuario
        $sql = "UPDATE usuario SET clav_usuario = :new_password WHERE doc_usuario = :doc_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':new_password', $new_password, PDO::PARAM_STR);
        $stmt->bindParam(':doc_usuario', $doc_usuario, PDO::PARAM_STR);
        $stmt->execute();

        $success = "Contraseña actualizada correctamente.";
    } else {
        $error = "No se encontró una cuenta con ese documento de identidad.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="../publico/css/bootstrap.min.css" rel="stylesheet">
    <script src="../publico/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5 pt-5">
        <h1>Recuperar Contraseña</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        <form action="recover_password.php" method="POST">
            <div class="mb-3">
                <label for="doc_usuario" class="form-label">Documento de Identidad</label>
                <input type="number" id="doc_usuario" name="doc_usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Nueva Contraseña</label>
                <input type="password" id="new_password" name="new_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>

