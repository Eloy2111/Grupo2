<?php
require_once 'conexion.php';

class Pedido {
    private $idPedido;
    private $idCliente;
    private $tipopaquete;
    private $estado;
    private $fecha_creacion;
    private $fecha_entrega;
    private $tipo;
    private $direccion;


    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setTipoPaquete($tipopaquete) {
        $this->tipopaquete = $tipopaquete;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFechaCreacion($fecha) {
        $this->fecha_creacion = $fecha;
    }

    public function setFechaEntrega($fecha) {
        $this->fecha_entrega = $fecha;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getTipoPaquete() {
        return $this->tipopaquete;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    public function getFechaEntrega() {
        return $this->fecha_entrega;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public static function getAllPedidos() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
    
        $sql = "SELECT pedido.*, cliente.nombre AS nombreCliente
                FROM pedido
                INNER JOIN cliente ON pedido.idCliente = cliente.idCliente";
        $result = $db->query($sql);
    
        $pedidos = [];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedido = new Pedido();
                $pedido->setIdPedido($row['idPedido']);
                $pedido->setIdCliente($row['nombreCliente']);
                $pedido->setTipoPaquete($row['tipopaquete']); 
                $pedido->setEstado($row['estado']);
                $pedido->setFechaCreacion($row['fecha_creacion']);
                $pedido->setFechaEntrega($row['fecha_entrega']);
                $pedido->setTipo($row['tipo']);
                $pedido->setDireccion($row['direccion']);
                $pedidos[] = $pedido;
            }
        }
    
        return $pedidos;
    }
}
