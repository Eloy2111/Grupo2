<?php
require_once '../Conn.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === "buscar") {
        if (isset($_POST['RastrearD']) && isset($_POST['datoRastrear'])) {
            $RastrearD = $_POST['RastrearD'];
            $datoRastrear = $_POST['datoRastrear'];

            $conexion = new Conn();
            $pdo = $conexion->conectar();

            $consulta = "SELECT pedido.*, cliente.nombre AS nombreCliente, empleado.nombre AS nombreEmpleado
             FROM pedido 
             INNER JOIN cliente ON pedido.idCliente = cliente.idCliente 
             INNER JOIN empleado ON pedido.idEmpleado = empleado.idEmpleado 
             WHERE $RastrearD = ?";
            $stmt = $pdo->prepare($consulta);
            $stmt->execute([$datoRastrear]);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['resultados'] = $resultados;
            header("Location: ../rastreado.php");
            exit;
        }
    }
}
?>

