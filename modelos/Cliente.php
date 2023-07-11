<?php
class Cliente{
    private $id_cliente; 
    private $id_empresa; 
    private $nombre;
    private $direccion;


    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarPorId($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Cliente WHERE id=$id_empresa";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO usuario(id_cliente,id_empresa,nombre,direccion;) 
                VALUES('".$this->id_cliente."', '".$this->id_empresa."', '".$this->nombre."' '".$this->direccion."')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }




}