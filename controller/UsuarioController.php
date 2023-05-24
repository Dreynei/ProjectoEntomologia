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
        
        //Aqui va la view de admin view
        //$this->view->show("mostrarregistrarusuariosView.php", NULL);
    }

    public function autenticarUsuario(){
        
        require 'model/UsuarioModel.php';

        $usuarioModel = new UsuarioModel();

        $resultado = $usuarioModel->autenticarUsuario(
                $_POST['usuario']
                , $_POST['contrasenna']
        );
      
        if ($resultado) {

            $this->view->show("buscarespecimenView.php", NULL);
        } else {
            $this->view->show("indexView.php", NULL);
        }
    }
    
    public function registrarUsuario() {
        
        require 'model/UsuarioModel.php';
        
        $usuarioModel = new UsuarioModel();
        
        $usuarioModel->registrarUsuario(
                $_POST['usuario']
                ,$_POST['contrasenna']
                ,$_POST['tipo']
                );
        
        //aqui la view
        $this->view->show("registrarausuarioView.php", NULL);
    }
    
}
