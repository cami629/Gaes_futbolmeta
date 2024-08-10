<?php
include('../config/db.php'); // Incluye el archivo de configuración de la base de datos
require_once('../controladores/Controller.php'); // Incluye el archivo del controlador principal
session_start();

// Instancia el controlador
$controller = new Controller($pdo);

// Inicializa variables para manejar errores y mensajes de éxito
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibe y sanitiza los datos del formulario
    $doc_usuario = filter_input(INPUT_POST, 'doc_usuario', FILTER_SANITIZE_NUMBER_INT);
    $nom_usuario = filter_input(INPUT_POST, 'nom_usuario', FILTER_SANITIZE_STRING);
    $ape_usuario = filter_input(INPUT_POST, 'ape_usuario', FILTER_SANITIZE_STRING);
    $clav_usuario = filter_input(INPUT_POST, 'clav_usuario', FILTER_SANITIZE_STRING);
    $tel_usuario = filter_input(INPUT_POST, 'tel_usuario', FILTER_SANITIZE_NUMBER_INT);
    $direc_usuario = filter_input(INPUT_POST, 'direc_usuario', FILTER_SANITIZE_STRING);
    $cor_usuario = filter_input(INPUT_POST, 'cor_usuario', FILTER_SANITIZE_EMAIL);

    // Verifica que los campos no estén vacíos
    if (empty($doc_usuario) || empty($nom_usuario) || empty($ape_usuario) || empty($clav_usuario) || empty($tel_usuario) || empty($direc_usuario) || empty($cor_usuario)) {
        $error = 'Por favor, complete todos los campos.';
    } else {
        // Intenta crear el nuevo usuario
        if ($controller->crearUsuario($doc_usuario, $nom_usuario, $ape_usuario, $clav_usuario, $tel_usuario, $direc_usuario, $cor_usuario)) {
            $success = 'Usuario registrado con éxito.';
        } else {
            $error = 'Error al registrar el usuario. Intente nuevamente.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="../publico/css/bootstrap.min.css" rel="stylesheet">
    <script src="../publico/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            flex: 1;
        }
        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100%;
            gap: 20px;
        }
        .form-column {
            width: 100%;
            max-width: 600px;
        }
        .form-column.left {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .form-column.right {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <div class="form-container">
            <div class="form-column left">
                <form action="register.php" method="post" class="w-100">
                <br><br><br><br>
                    <div class="form-group mb-3">
                        <label for="doc_usuario" class="form-label">Documento de Identidad</label>
                        <input type="number" class="form-control" id="doc_usuario" name="doc_usuario" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nom_usuario" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="ape_usuario" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="ape_usuario" name="ape_usuario" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="clav_usuario" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="clav_usuario" name="clav_usuario" required>
                    </div>
                
            </div>
            <div class="form-column right">
                    <div class="form-group mb-3">
                    <br><br><br><br>
                        <label for="tel_usuario" class="form-label">Teléfono</label>
                        <input type="number" class="form-control" id="tel_usuario" name="tel_usuario" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="direc_usuario" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direc_usuario" name="direc_usuario" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cor_usuario" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="cor_usuario" name="cor_usuario" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cor_usuario" class="form-label"></label><br>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
            </div>
            <div>
                    <?php if ($error): ?>
                        <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="alert alert-success mt-3"><?php echo htmlspecialchars($success); ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php include('../includes/footer.php'); ?>
    </div>
</body>
</html>
