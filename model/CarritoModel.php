<?php

class CarritoModel {
    
    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::getInstance();
    } // constructor
    
    public function registrarCarrito($id_usuario, $id_especimen) {
        
        $consulta=$this->db->prepare("call sp_registrar_carrito(".$id_usuario.",".$id_especimen.",0)");
        $resultado=$consulta->execute();
        return $resultado;
    } 
    
    public function mostrarCarrito($id) {
        $consulta=$this->db->prepare("call sp_obtener_carrito(".$id.")");
        $resultado=$consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    
    
    
    
}
