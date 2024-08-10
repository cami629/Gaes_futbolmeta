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

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $doc_usuario = $_POST['doc_usuario'];
    $nom_usuario = $_POST['nom_usuario'];
    $ape_usuario = $_POST['ape_usuario'];
    $clav_usuario = $_POST['clav_usuario'];
    $tel_usuario = $_POST['tel_usuario'];
    $direc_usuario = $_POST['direc_usuario'];
    $cor_usuario = $_POST['cor_usuario'];

    // Actualiza los datos del usuario en la base de datos
    $sql = "UPDATE usuario SET doc_usuario = :doc_usuario, nom_usuario = :nom_usuario, ape_usuario = :ape_usuario, clav_usuario = :clav_usuario, tel_usuario = :tel_usuario, direc_usuario = :direc_usuario, cor_usuario = :cor_usuario WHERE id_usuario = :id_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'doc_usuario' => $doc_usuario,
        'nom_usuario' => $nom_usuario,
        'ape_usuario' => $ape_usuario,
        'clav_usuario' => $clav_usuario,
        'tel_usuario' => $tel_usuario,
        'direc_usuario' => $direc_usuario,
        'cor_usuario' => $cor_usuario,
        'id_usuario' => $id_usuario
    ]);

    // Redirige al panel de control después de la actualización
    header("Location: panelDeControl.php");
    exit;
}

// Recupera los datos del usuario para mostrar en el formulario
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_usuario' => $id_usuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>Editar Usuario</title>
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
        <h1>Editar Usuario</h1>
        <form action="editar_usuario.php" method="POST">
            <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($usuario['id_usuario']); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="doc_usuario">Documento de Identidad</label>
                        <input type="text" class="form-control" id="doc_usuario" name="doc_usuario" value="<?php echo htmlspecialchars($usuario['doc_usuario']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nom_usuario">Nombre</label>
                        <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" value="<?php echo htmlspecialchars($usuario['nom_usuario']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ape_usuario">Apellido</label>
                        <input type="text" class="form-control" id="ape_usuario" name="ape_usuario" value="<?php echo htmlspecialchars($usuario['ape_usuario']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="clav_usuario">Contraseña</label>
                        <input type="password" class="form-control" id="clav_usuario" name="clav_usuario" value="<?php echo htmlspecialchars($usuario['clav_usuario']); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel_usuario">Teléfono</label>
                        <input type="text" class="form-control" id="tel_usuario" name="tel_usuario" value="<?php echo htmlspecialchars($usuario['tel_usuario']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="direc_usuario">Dirección</label>
                        <input type="text" class="form-control" id="direc_usuario" name="direc_usuario" value="<?php echo htmlspecialchars($usuario['direc_usuario']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cor_usuario">Correo Electrónico</label>
                        <input type="email" class="form-control" id="cor_usuario" name="cor_usuario" value="<?php echo htmlspecialchars($usuario['cor_usuario']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                </div>
            </div>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
