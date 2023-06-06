<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioModel
 *
 * @author Miguel
 */
class UsuarioModel {
    
    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::getInstance();
    } // constructor
     
    
   public function registrarUsuario($usuario, $contrasenna, $tipo){
        
        $hash = password_hash($contrasenna, PASSWORD_DEFAULT); 
        
        $consulta = $this->db->prepare("call sp_registrar_usuario('".$usuario."', '".$hash."', '".$tipo."')");
        $resultado = $consulta->execute();
        return $resultado;
        
    }
    
    public function autenticarUsuario($usuario, $contrasenna){
        
       $consulta = $this->db->prepare("call sp_obtener_contrasenna_usuario('".$usuario."')");
        
       $consulta->execute();
       
       $resultado = $consulta->fetchColumn();
       return password_verify($contrasenna, $resultado);
               
    }
    
    public function obtenerUserInfo($usuario){
         $consulta = $this->db->prepare("call sp_obtener_informacion_usuario('".$usuario."')");
        
       $consulta->execute();
       
       $resultado = $consulta->fetchAll();
        
       return $resultado;
    }
    
    public function obtenerTiposUsuario(){
        
       $consulta = $this->db->prepare("call sp_listar_tipos_usuario()");
        
       $consulta->execute();
       
       $resultado = $consulta->fetchAll();
        
       return $resultado;
       
    }
    
}
