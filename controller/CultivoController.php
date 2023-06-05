<?php

class CultivoController {
    
    public function __construct() {
        $this->view = new View();
        session_start();
    }
    
    public function mostrar() {
        $this->view->show("cultivoView.php",null);
    }
    
    public function registrarCultivo() {
         require 'model/CultivoModel.php';

        $cultivoModel = new CultivoModel();

        $respuesta = $cultivoModel->registrarCultivo($_POST['cultivoN']);

        if ($respuesta) {

            $lista['mensaje'] = array("Se registro el cultivo: ".$_POST['cultivoN']);
        } else {

            $lista['mensaje'] = array("No se ha podido registrar el cultivo");
        }

        $this->view->show("cultivoView.php", $lista);
    }
}
