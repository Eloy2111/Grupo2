<?php
session_start();
$resultados = isset($_SESSION['resultados']) ? $_SESSION['resultados'] : [];
unset($_SESSION['resultados']);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/tracking.css">
    <title>Resultados de Rastreo</title>
</head>
<body>
    <h1>Pedido Rastreado</h1>

    <?php
    if (!empty($resultados)) {
        echo "<h2>Detalle del Pedido:</h2>";
        echo "<ul>";

        foreach ($resultados as $resultado) {
            echo "<li>";
            echo "ID de Pedido: " . $resultado['idPedido'] . "<br>";
            echo "Nombre de Cliente: " . $resultado['nombre'] . "<br>";
            echo "Nombre de Cliente: " . $resultado['telefono'] . "<br>";
            echo "Nombre de Empleado: " . $resultado['nombre'] . "<br>";  
            echo "Celular del Empleado: " . $resultado['telefono'] . "<br>";  
            echo "Direccion de Entrega: " . $resultado['direccion'] . "<br>"; 
            echo "Estado del Paquete: " . $resultado['estado'] . "<br>"; 
            
            echo "</li>";
        }

        echo "</ul>";
    } else {
        echo "<p>No se encontron datos de su pedido causa pipipipiip.</p>";
    }
    ?>
    <button type="button" onclick="location.href='Tracking.php'">VOLVER</button>
</body>
</html>


