<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SuperAdministradorController
 *
 * @author Miguel
 */
class SuperAdministradorController {
    
    public function __construct() {
        $this->view=new View();
    }//constructor
    
    public function mostrar() {
        //view super admin
        $this->view->show("superloginView.php", NULL);
    }
    
    public function registrarMostrar() {
        $this->view->show("registraradministradorView.php", NULL);
    }

    public function registrarAdministrador() {
        
        require 'model/SuperAdministradorModel.php';
        
        $superAdministradorModel = new SuperAdministradorModel();
        
        $superAdministradorModel->registrarAdministrador(
                $_POST['usuario']
                ,$_POST['contrasenna']
                );
         //aqui la view
        $this->view->show("registraradministradorView.php", NULL);
    }

     public function registrarUsuario() {
        
        require 'model/SuperAdministradorModel.php';
        
        $superadministradorModel = new SuperAdministradorModel();
        
        $superadministradorModel->registrarUsuario(
                $_POST['usuario']
                ,$_POST['contrasenna']
                ,$_POST['tipo']
                );
        
        //aqui la view
        $this->view->show("registrarausuarioView.php", NULL);
    }

    public function autenticarAdministrador(){
        
        require 'model/SuperAdministradorModel.php';
        
        $superAdministradorModel = new SuperAdministradorModel();
        
        $resultado = $superAdministradorModel->autenticarAdministrador(
                $_POST['usuario']
                ,$_POST['contrasenna']
                );
         //aqui la view
        $this->view->show("registraradministradorView.php", NULL);
        
    }
    
}
