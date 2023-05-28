<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SuperAdministradorModel
 *
 * @author Miguel
 */
class SuperAdministradorModel {
    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::getInstance();
    } // constructor
    
    public function registrarAdministrador($usuario, $contrasenna){
        
        $hash = password_hash($contrasenna, PASSWORD_DEFAULT); 
        
        $consulta = $this->db->prepare("call sp_registrar_administrador('".$usuario."', '".$hash."')");
        $resultado = $consulta->execute();
        return $resultado;
    }
    
      public function registrarUsuario($usuario, $contrasenna, $tipo){
        
        $hash = password_hash($contrasenna, PASSWORD_DEFAULT); 
        
        $consulta = $this->db->prepare("call sp_registrar_usuario('".$usuario."', '".$hash."', '".$tipo."')");
        $resultado = $consulta->execute();
        return $resultado;
        
    }
    
    public function autenticarAdministrador($usuario, $contrasenna){
        
       $consulta = $this->db->prepare("call sp_obtener_contrasenna_administrador('".$usuario."')");
        
       $consulta->execute();
       
       $resultado = $consulta->fetchColumn();
       
       return password_verify($contrasenna, $resultado);
            
    }
    
}
