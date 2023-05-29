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
        //solucion mas simple     
//       $consulta = $this->db->prepare("call sp_autenticar_usuario('".$usuario."', '".$contrasenna."')");
//        
//       $consulta->execute();
//       
//       $resultado = $consulta->fetchColumn();
//       
//       return $resultado;
       
        
       $consulta = $this->db->prepare("call sp_obtener_contrasenna_usuario('".$usuario."')");
        
       $consulta->execute();
       
       $resultado = $consulta->fetchColumn();
       return password_verify($contrasenna, $resultado);
               
    }
    
    public function obtenerUserInfo(){
         $consulta = $this->db->prepare("call 	sp_obtener_tipo_usuario('".$usuario."')");
        
       $consulta->execute();
       
       $resultado = $consulta->fetchAll();
        
       return $resultado;
    }
    
    public function obtenerTiposUsuario($usuario){
        
       $consulta = $this->db->prepare("call listar_tipos_usuarios()");
        
       $consulta->execute();
       
       $resultado = $consulta->fetchAll();
        
       return $resultado;
       
    }
    
}
