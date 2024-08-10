<?php
class Controller {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para obtener todos los usuarios
    public function getUsuarios() {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un usuario por su ID
    public function getUsuarioById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para crear un nuevo usuario
    public function crearUsuario($doc_usuario, $nom_usuario, $ape_usuario, $clav_usuario, $tel_usuario, $direc_usuario, $cor_usuario) {
        $stmt = $this->pdo->prepare("INSERT INTO usuario (doc_usuario, nom_usuario, ape_usuario, clav_usuario, tel_usuario, direc_usuario, cor_usuario) VALUES (:doc_usuario, :nom_usuario, :ape_usuario, :clav_usuario, :tel_usuario, :direc_usuario, :cor_usuario)");
        $stmt->bindParam(':doc_usuario', $doc_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':nom_usuario', $nom_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':ape_usuario', $ape_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':clav_usuario', $clav_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':tel_usuario', $tel_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':direc_usuario', $direc_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':cor_usuario', $cor_usuario, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Método para actualizar un usuario
    public function actualizarUsuario($id, $doc_usuario, $nom_usuario, $ape_usuario, $clav_usuario, $tel_usuario, $direc_usuario, $cor_usuario) {
        $stmt = $this->pdo->prepare("UPDATE usuario SET doc_usuario = :doc_usuario, nom_usuario = :nom_usuario, ape_usuario = :ape_usuario, clav_usuario = :clav_usuario, tel_usuario = :tel_usuario, direc_usuario = :direc_usuario, cor_usuario = :cor_usuario WHERE id_usuario = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':doc_usuario', $doc_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':nom_usuario', $nom_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':ape_usuario', $ape_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':clav_usuario', $clav_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':tel_usuario', $tel_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':direc_usuario', $direc_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':cor_usuario', $cor_usuario, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Método para eliminar un usuario
    public function eliminarUsuario($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
