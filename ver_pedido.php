<!-- vistas/ver_pedidos.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/verpedido.css">
    <title>Ver Pedidos</title>
</head>
<body>
    <h1>Lista de Pedidos</h1>

    <?php
    require_once 'conexion.php';
    require_once 'modelos/pedido.php';

    $pedidos = Pedido::getAllPedidos();

    if (!empty($pedidos)):
    ?>
        <table>
            <tr>
                <th>Número de Pedido</th>
                <th>Cliente</th>
                <th>Tipo Paquete</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Entrega</th>
                <th>Tipo de envio</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?php echo $pedido->getIdPedido(); ?></td>
                    <td><?php echo $pedido->getIdCliente(); ?></td> 
                    <td><?php echo $pedido->getTipoPaquete(); ?></td> 
                    <td><?php echo $pedido->getEstado(); ?></td>
                    <td><?php echo $pedido->getFechaCreacion(); ?></td>
                    <td><?php echo $pedido->getFechaEntrega(); ?></td>
                    <td><?php echo $pedido->getTipo(); ?></td>
                    <td><?php echo $pedido->getDireccion(); ?></td>
                    <td>
                        <a href="editar_pedido.php?id=<?php echo $pedido->getIdPedido(); ?>" class="edit-button">Editar</a>
                        <a href="eliminar_pedido.php?id=<?php echo $pedido->getIdPedido(); ?>" class="delete-button">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p class="no-pedidos">No hay pedidos disponibles.</p>
    <?php endif; ?>

</body>
</html>
