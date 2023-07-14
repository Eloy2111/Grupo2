<?php

require_once "conexion.php";

class Pedido {
    private $idCliente;
    private $fecha_creacion;
    private $tipo;
    private $direccion;
    private $tipopaquete;

    public function mostrar() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "SELECT * FROM pedido";
        $resultado = $db->query($sql);

        return $resultado;
    }

    public function guardar() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "INSERT INTO pedido(idCliente, fecha_creacion, tipo, direccion, tipopaquete) 
                VALUES('".$this->idCliente."', '".$this->fecha_creacion."', '".$this->tipo."', '".$this->direccion."', '".$this->tipopaquete."')";
        $resultado = $db->query($sql);

        return $resultado;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setFechaCreacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setTipoPaquete($tipopaquete) {
        $this->tipopaquete = $tipopaquete;
    }
}
