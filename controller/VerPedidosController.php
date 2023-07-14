// controladores/VerPedidosController.php
<?php
require 'ver_pedido.php';

class VerPedidosController {
    public function verPedidos() {
        $pedidos = Pedido::getAllPedidos();

    }
}
?>
