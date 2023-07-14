<?php
require_once "conexion.php";

if (isset($_GET["id"])) {
    $idPedido = $_GET["id"];

    
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $numeroPedido = $_POST["numero_pedido"];
        $estado = $_POST["estado"];
        $fechaEntrega = $_POST["fecha_entrega"];
        $tipoEnvio = $_POST["tipo_envio"];
        $direccion = $_POST["direccion"];

        
        if (empty($fechaEntrega)) {
            $fechaEntrega = null; 
        }

       
        $sql = "UPDATE pedido SET idPedido = ?, estado = ?, fecha_entrega = ?, tipo = ?, direccion = ? WHERE idPedido = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssssi", $numeroPedido, $estado, $fechaEntrega, $tipoEnvio, $direccion, $idPedido);
        $stmt->execute();

        
        header("Location: ver_pedido.php");
        exit();
    } else {
        
        $sql = "SELECT * FROM pedido WHERE idPedido = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $idPedido);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $pedido = $result->fetch_assoc();
            $numeroPedido = $pedido["idPedido"];
            $estado = $pedido["estado"];
            $fechaEntrega = $pedido["fecha_entrega"];
            $tipoEnvio = $pedido["tipo"];
            $direccion = $pedido["direccion"];
        } else {
            
            header("Location: ver_pedido.php");
            exit();
        }
    }
} else {
    
    header("Location: ver_pedido.php");
    exit();
}
?>

<!-- vistas/editar_pedido.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/editarpedido.css">
    <title>Editar Pedido</title>
    <script>
        function handleEstadoChange() {
            var estadoSelect = document.getElementById('estado');
            var fechaEntregaInput = document.getElementById('fecha_entrega');

            if (estadoSelect.value === 'Entregado') {
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().split('T')[0];
                fechaEntregaInput.value = formattedDate;
                fechaEntregaInput.setAttribute('readonly', 'readonly');
            } else {
                fechaEntregaInput.value = '';
                fechaEntregaInput.removeAttribute('readonly');
            }
        }
    </script>
</head>
<body>
    <h1>Editar Pedido</h1>

    <form action="editar_pedido.php?id=<?php echo $idPedido; ?>" method="POST">
        <label for="numero_pedido">Número de Pedido:</label>
        <input type="text" id="numero_pedido" name="numero_pedido" value="<?php echo $numeroPedido; ?>" required>
        <br>
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" onchange="handleEstadoChange();" required>
            <option value="Pedido creado" <?php if ($estado === 'Pedido creado') echo 'selected'; ?>>Pedido creado</option>
            <option value="Por enviar" <?php if ($estado === 'Por enviar') echo 'selected'; ?>>Por enviar</option>
            <option value="Enviado" <?php if ($estado === 'Enviado') echo 'selected'; ?>>Enviado</option>
            <option value="Entregado" <?php if ($estado === 'Entregado') echo 'selected'; ?>>Entregado</option>
        </select>
        <br>
        <br>
        <label for="fecha_entrega">Fecha de Entrega:</label>
        <input type="date" id="fecha_entrega" name="fecha_entrega" value="<?php echo $fechaEntrega; ?>">
        <br>
        <br>
        <label for="tipo_envio">Tipo de Envío:</label>
        <select id="tipo_envio" name="tipo_envio" required>
            <option value="A pie" <?php if ($tipoEnvio === 'A pie') echo 'selected'; ?>>A pie</option>
            <option value="A moto" <?php if ($tipoEnvio === 'A moto') echo 'selected'; ?>>A moto</option>
        </select>
        <br>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" required>
        <br>
        <br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
