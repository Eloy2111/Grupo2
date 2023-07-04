<?php

require_once "modelos/Usuario.php";

class UsuarioController{
    public function mostrar(){
        $usuario = new Usuario();
        return $usuario->mostrar();
    }

    public function mostrarPorId($idCliente){
        $usuario = new Usuario();
        return $usuario->mostrarPorId($idCliente);
    }

    public function guardar($nombre, $direccion){
        $usuario = new Usuario();
        $usuario->setUsuario($usuario);
        $usuario->setContraseña($contraseña);
        $usuario->setRuc($ruc);
        $usuario->setNombre($nombre);
        $usuario->setDireccion($direccion);
        $usuario->setTelefono($telefono);
        
        return $usuario->guardar();            
    }
    
}
