<?php
include 'config.php';

try {
    $stmt = $conn->query("SELECT * FROM conciertos");
    $conciertos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($conciertos as $concierto) {
        echo "<div class='concierto'>";
        echo "<h3>" . htmlspecialchars($concierto['nombre']) . "</h3>";
        echo "<p>Artista: " . htmlspecialchars($concierto['artista']) . "</p>";
        echo "<p>Fecha: " . htmlspecialchars($concierto['fecha']) . " a las " . htmlspecialchars($concierto['hora']) . "</p>";
        echo "<p>Ubicación: " . htmlspecialchars($concierto['ubicacion']) . "</p>";
        echo "<p>Género: " . htmlspecialchars($concierto['genero']) . "</p>";
        echo "<img src='" . htmlspecialchars($concierto['imagen_url']) . "' alt='Imagen del concierto'>";
        echo "</div>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
