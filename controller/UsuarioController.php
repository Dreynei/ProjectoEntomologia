<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioController
 *
 * @author Miguel
 */
class UsuarioController {
   
    public function __construct() {
        $this->view=new View();
    }//constructor
    
    
    public function mostrar() {
        
        $this->view->show("usuariologinView.php", NULL);
    }

    public function autenticarUsuario(){
        
        require 'model/UsuarioModel.php';

        $usuarioModel = new UsuarioModel();

        $resultado = $usuarioModel->autenticarUsuario(
                $_POST['usuario']
                , $_POST['contrasenna']
        );
      
        
        $lista["lista"] = $usuarioModel->obtenerTiposUsuario();
        
        if ($resultado) {

            $this->view->show("registrarusuarioView.php", $lista);
        } else {
            $this->view->show("usuariologinView.php", NULL);
        }
    }
    
    public function registrarUsuario() {
        
        require 'model/UsuarioModel.php';
        
        $usuarioModel = new UsuarioModel();
        
        $resultado = $usuarioModel->registrarUsuario(
                $_POST['usuario']
                ,$_POST['contrasenna']
                ,$_POST['tipo']
                );
        
        
        if($resultado){
            
            $lista['mensaje'] = array('Registrado correctamente');
            
        }else{
            
            $lista['mensaje'] = array('Error en el registro, usuario duplicado o valores invalidos');
            
        }
        
        
        $lista["lista"] = $usuarioModel->obtenerTiposUsuario();

        //aqui la view
        $this->view->show("registrarusuarioView.php", $lista);
    }
    
}
