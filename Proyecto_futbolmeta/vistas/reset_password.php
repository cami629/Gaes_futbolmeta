<?php
session_start();
require '../config/db.php'; // Incluye el archivo de configuración de la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    // Verificar si el token es válido
    $sql = "SELECT * FROM password_resets WHERE token = :token LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $reset_request = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($reset_request) {
        $email = $reset_request['email'];

        // Actualizar la contraseña del usuario
        $sql = "UPDATE usuario SET clav_usuario = :new_password WHERE cor_usuario = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':new_password', $new_password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Eliminar la solicitud de recuperación de contraseña
        $sql = "DELETE FROM password_resets WHERE token = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION['message'] = "Contraseña actualizada con éxito. Ahora puedes iniciar sesión con tu nueva contraseña.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Token inválido o expirado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="../publico/css/bootstrap.min.css" rel="stylesheet">
    <script src="../publico/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Restablecer Contraseña</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                            unset($_SESSION['error']);
                        }
                        ?>
                        <form action="reset_password.php" method="POST">
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Restablecer Contraseña</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="login.php">Volver al inicio de sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
