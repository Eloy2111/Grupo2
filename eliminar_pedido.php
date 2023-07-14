<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $idPedido = $_GET['id'];

    
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $sql = "DELETE FROM pedido WHERE idPedido = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $idPedido);
    $stmt->execute();

    
    header("Location: ver_pedido.php");
    exit();
} else {
   
    header("Location: ver_pedido.php");
    exit();
}
?>
