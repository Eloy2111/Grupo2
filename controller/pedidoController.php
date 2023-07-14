<?php

require_once "modelos/registrar.php";

class pedidoController{

    public function mostrar(){
        $pedido = new Pedido();
        return $pedido->mostrar();
    }

    public function guardar($idCliente,$fecha_creacion, $tipo,$direccion, $tipopaquete){
        $pedido = new Pedido();
        $pedido->setIdCliente($idCliente);
        $pedido->setFechaCreacion($fecha_creacion);
        $pedido->setTipo($tipo);
        $pedido->setDireccion($direccion);
        $pedido->setDireccion($tipopaquete);
        
       
        return $pedido -> guardar();        
    }
}