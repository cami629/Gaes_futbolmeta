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

// Maneja la creación de un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doc_usuario = $_POST['doc_usuario'];
    $nom_usuario = $_POST['nom_usuario'];
    $ape_usuario = $_POST['ape_usuario'];
    $clav_usuario = $_POST['clav_usuario'];
    $tel_usuario = $_POST['tel_usuario'];
    $direc_usuario = $_POST['direc_usuario'];
    $cor_usuario = $_POST['cor_usuario'];

    try {
        // Inserta el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuario (doc_usuario, nom_usuario, ape_usuario, clav_usuario, tel_usuario, direc_usuario, cor_usuario) 
                VALUES (:doc_usuario, :nom_usuario, :ape_usuario, :clav_usuario, :tel_usuario, :direc_usuario, :cor_usuario)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'doc_usuario' => $doc_usuario,
            'nom_usuario' => $nom_usuario,
            'ape_usuario' => $ape_usuario,
            'clav_usuario' => $clav_usuario,
            'tel_usuario' => $tel_usuario,
            'direc_usuario' => $direc_usuario,
            'cor_usuario' => $cor_usuario
        ]);

        // Redirige al panel de control después de la creación
        header("Location: panelDeControl.php");
        exit;
    } catch (Exception $e) {
        $error = "Error al crear el usuario: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
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
        <h1>Crear Usuario</h1>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="crear_usuario.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="doc_usuario" class="form-label">Documento de Identidad</label>
                        <input type="number" id="doc_usuario" name="doc_usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nom_usuario" class="form-label">Nombre</label>
                        <input type="text" id="nom_usuario" name="nom_usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="ape_usuario" class="form-label">Apellido</label>
                        <input type="text" id="ape_usuario" name="ape_usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="clav_usuario" class="form-label">Contraseña</label>
                        <input type="password" id="clav_usuario" name="clav_usuario" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tel_usuario" class="form-label">Teléfono</label>
                        <input type="number" id="tel_usuario" name="tel_usuario" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="direc_usuario" class="form-label">Dirección</label>
                        <input type="text" id="direc_usuario" name="direc_usuario" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cor_usuario" class="form-label">Correo Electrónico</label>
                        <input type="email" id="cor_usuario" name="cor_usuario" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Registrar</button>
                </div>
            </div>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
