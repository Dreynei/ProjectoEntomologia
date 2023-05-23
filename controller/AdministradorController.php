<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdministradorController
 *
 * @author Miguel
 */
class AdministradorController {
   
    public function __construct() {
        $this->view=new View();
    }//constructor
    
    
    public function mostrar() {
        
        //Aqui va la view de admin view
        $this->view->show("mostrarregistrarusuariosView.php", NULL);
    }

    public function registrarUsuario() {
        
        require 'model/AdministradorModel.php';
        
        $administradorModel = new AdministradorModel();
        
        $administradorModel->registrarUsuario(
                $_POST['usuario']
                ,$_POST['contrasenna']
                ,$_POST['tipo']
                );
        
        //aqui la view
        $this->view->show("registrarausuarioView.php", NULL);
    }
    
}
