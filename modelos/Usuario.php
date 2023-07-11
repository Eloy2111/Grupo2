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
        $sql = "SELECT * FROM cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarPorId($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente WHERE id=$idCliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO cliente(usuario, password, ruc, nombre, direccion, telefono) 
                VALUES('".$this->usuario."', '".$this->password."', '".$this->ruc."', '".$this->nombre."', '".$this->direccion."', ".$this->telefono."')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarEmail(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente WHERE email='".$this->email."'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    public function setNombres($nombre){
        $this->nombre = $nombre;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

}