<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of carritoController
 *
 * @author drey0
 */
class carritoController {

    public function __construct() {
        $this->view = new View();
    }

//constructor

    public function mostrar() {
        $this->view->show("carritoView.php", null);
    }

    function registrarInsectoCarrito() {
        require 'model/CarritoModel.php';
        $carritoModel = new CarritoModel();
        $resultado = $carritoModel->registrarCarrito($_POST['id_usuario'], $_POST['id_especimen']);
        echo $resultado;
    }
       
}
    