<?php

class CultivoController {

    public function __construct() {
        $this->view = new View();
        session_start();
    }

    public function mostrar() {
        require 'model/CultivoModel.php';

        $cultivoModel = new CultivoModel();

        $respuesta1 = $cultivoModel->obtenerGeneros();
        $respuesta2 = $cultivoModel->obtenerCultivos();
        $lista['genero'] = $respuesta1;
        $lista['cultivo'] = $respuesta2;
        $this->view->show("cultivoView.php", $lista);
    }

    public function mostrarBuscarCultivo() {
        $this->view->show("buscarcultivoView.php", null);
    }

    public function buscarCultivo() {
        require 'model/CultivoModel.php';
        $cultivoModel = new CultivoModel();
        $lista['lista'] = $cultivoModel->buscarCultivo($_POST['NombreC']);
        
        $this->view->show("buscarcultivoView.php", $lista);
    }

    public function registrarCultivo() {
        require 'model/CultivoModel.php';

        $cultivoModel = new CultivoModel();

        $respuesta = $cultivoModel->registrarCultivo($_POST['cultivoN']);

        if ($respuesta) {

            $lista['mensaje'] = array("Se registro el cultivo: " . $_POST['cultivoN']);
        } else {

            $lista['mensaje'] = array("No se ha podido registrar el cultivo");
        }
        $respuesta1 = $cultivoModel->obtenerGeneros();
        $respuesta2 = $cultivoModel->obtenerCultivos();
        $lista['genero'] = $respuesta1;
        $lista['cultivo'] = $respuesta2;
        $this->view->show("cultivoView.php", $lista);
    }

    public function registrarGeneroCultivo() {
        require 'model/CultivoModel.php';

        $cultivoModel = new CultivoModel();

        $respuesta = $cultivoModel->registrarGeneroCultivo($_POST['genero_id'], $_POST['cultivo_id']);

        if ($respuesta) {

            $lista['mensaje1'] = array("Se asignaron correctamente");
        } else {

            $lista['mensaje1'] = array("No se ha podido realizar la aignacion " . $_POST['genero_id'] . " " . $_POST['cultivo_id']);
        }
        $respuesta1 = $cultivoModel->obtenerGeneros();
        $respuesta2 = $cultivoModel->obtenerCultivos();
        $lista['genero'] = $respuesta1;
        $lista['cultivo'] = $respuesta2;
        $this->view->show("cultivoView.php", $lista);
    }

}
