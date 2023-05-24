<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdministradorModel
 *
 * @author Miguel
 */
class AdministradorModel {
    
    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::getInstance();
    } // constructor
     
    
   public function registrarUsuario($usuario, $contrasenna, $tipo){
        
        $hash = password_hash($contrasenna, PASSWORD_DEFAULT); 
        
        $consulta = $this->db->prepare("call sp_registrar_usuario('".$usuario."', '".$hash."', '".$tipo."')");
        $resultado = $consulta->execute();
        return $resultado;
        
    }
    
    public function autenticarUsuario($usuario, $contrasenna){
                
       

    }
    
}
