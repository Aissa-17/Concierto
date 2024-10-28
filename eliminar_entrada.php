<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entrada_id']) && isset($_SESSION['user_id'])) {
    $entrada_id = $_POST['entrada_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM entradas WHERE id = :entrada_id AND usuario_id = :usuario_id");
        $stmt->bindParam(':entrada_id', $entrada_id);
        $stmt->bindParam(':usuario_id', $_SESSION['user_id']);
        $stmt->execute();

        echo "Entrada eliminada";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
