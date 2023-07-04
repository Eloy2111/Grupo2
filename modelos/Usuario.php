<?php

require_once "Conn.php";

class Usuario{
    private $usuario;
    private $contraseña;
    private $ruc;
    private $nombre;
    private $direccion;
    private $telefono;


    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarPorId($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario WHERE id=$idCliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO usuario(usuario, contraseña, ruc, nombre, direccion, telefono) 
                VALUES('".$this->usuario."', '".$this->contraseña."', '".$this->ruc."', '".$this->nombre."', '".$this->direccion."', ".$this->telefono."')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }




}