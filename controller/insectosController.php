<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of insectosController
 *
 * @author drey0
 */
class insectosController {

    public function __construct() {
        $this->view = new View();
    }

// constructor

    public function mostrarRegistrarGenero() {

        $this->view->show("registrargeneroView.php", NULL);
    }

// mostrar

    public function mostrarRegistrarInsecto() {
        if (isset($_SESSION['user'])) {
            $this->view->show("registrarinsectoView.php", NULL);
        } else {
            $this->view->show("usuariologinView.php", null);
        }
    }

    public function mostrar() {

        $this->view->show("buscarespecimenView.php", NULL);
    }

// mostrar
}
