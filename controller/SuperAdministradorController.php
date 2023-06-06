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

        session_start();
        $this->view = new View();
    }

//constructor

    public function mostrar() {
        //view super admin
        $this->view->show("superloginView.php", NULL);
    }

    public function autenticarAdministrador() {

        require 'model/ SuperAdministradorModel.php';

        $usuarioModel = new SuperAdministradorModel();

        $resultado = $usuarioModel->autenticarAdministrador(
                $_POST['usuario']
                , $_POST['contrasenna']
        );

        if ($resultado) {
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['tipo'] = 1;

            $this->view->show("buscarespecimenView.php", null);
        } else {
            $this->view->show("superloginView.php", null);
        }
    }

}
