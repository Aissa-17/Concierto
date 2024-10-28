<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $preferencias = $_POST['preferencias'];
    $usuario_id = $_SESSION['user_id'];

    try {
        $stmt = $conn->prepare("UPDATE usuarios SET preferencias = :preferencias WHERE id = :id");
        $stmt->bindParam(':preferencias', $preferencias);
        $stmt->bindParam(':id', $usuario_id);
        $stmt->execute();

        echo "Preferencias actualizadas";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
