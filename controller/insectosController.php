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
        session_start();
    }

// constructor

    public function mostrar() {
        $this->view->show("buscarespecimenView.php", NULL);
    }

// mostrar

    public function mostrarRegistrarGenero() {

        $this->view->show("registrargeneroView.php", NULL);
    }

// mostrar

    public function mostrarBuscarOrden() {

        $this->view->show("buscarordenView.php", NULL);
    }

    public function registrarImagen() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarImagen();

        return $respuesta;
    }
    
    public function registrarInsecto() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();
        
        $respuesta = false;
        
        //en caso que sea otro metodo de almacen como una bolsa
        if(!isset($_POST['gabineteOCaja']) && !isset($_POST['gavetaOVial'])){
            
             $respuesta = $insectosModel->registrarInsecto($_FILES['imagen']['name'],
                $_FILES['imagen']['type'], $_FILES['imagen']['size'],
                $_FILES['imagen']['tmp_name'], $_POST['recolector'],
                $_POST['pais'], $_POST['provincia'], $_POST['canton'],
                $_POST['distrito'], $_POST['fecha'], $_POST['especie'], 
                $_POST['almacen'], 0, 0);
            
        }
        // en caso que sea gabinete o caja y gaveta o vial
        else if(isset( $_POST['gabineteOCaja']) && isset($_POST['gavetaOVial'])){
        
        $respuesta = $insectosModel->registrarInsecto($_FILES['imagen']['name'],
                $_FILES['imagen']['type'], $_FILES['imagen']['size'],
                $_FILES['imagen']['tmp_name'], $_POST['recolector'],
                $_POST['pais'], $_POST['provincia'], $_POST['canton'],
                $_POST['distrito'], $_POST['fecha'], $_POST['especie'], 
                $_POST['almacen'],  $_POST['gabineteOCaja'], $_POST['gavetaOVial']);
        }
        
        if ($respuesta) {

            $lista['mensaje'] = array("Insecto registrado correctamente");
        } else {

            $lista['mensaje'] = array("No se ha podido registrar el insecto");
        }

        $lista['lista'] = $insectosModel->obtenerOrdenes();
        
        $lista['almacen'] = $insectosModel->listarAlmacenes();
        
        $this->view->show("registrarinsectoView.php", $lista);
    }

    public function registrarGabinete(){
        
        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarGabinete($_POST['idGabinete']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
        
    }
    
    public function registrarCaja(){
        
        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarCaja($_POST['idCaja']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
        
    }
    
    public function registrarGaveta(){
        
        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarGaveta($_POST['idGabinete'], $_POST['idGaveta']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
        
    }
    
    public function registrarVial(){
        
        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarVial($_POST['idCaja'], $_POST['idVial']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
        
    }
    
    public function listarGabinetes(){
        
        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista = $insectosModel->listarGabinetes();

        echo json_encode($lista);
    }
    
    public function listarCajas(){
        
        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista = $insectosModel->listarCajas();

        echo json_encode($lista);
        
    }
    
    public function listarGabetasOV(){
        
        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();
        
        if($_POST['almacen'] === "Gabinete"){
            $lista = $insectosModel->listarGabetas($_POST['gabineteOC']);
        }
        
        if($_POST['almacen'] === "Caja"){
        $lista = $insectosModel->listarViales($_POST['gabineteOC']);
        }
        
        echo json_encode($lista);
        
    }
    
    public function registrarRecoleccion() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarRecoleccion($_POST['recolector'],
                $_POST['pais'], $_POST['provincia'], $_POST['canton'],
                $_POST['distrito'], $_POST['fecha']);

        return $respuesta;
    }

    public function mostrarImagen() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista['lista'] = $insectosModel->mostrarImagen(//$_POST['especimen']
        "NuevaEspecie");
         
        $this->view->show("mostrarpruebaespecimenesView.php", $lista);
        
    }

    public function registrarOrden() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarOrden($_POST['orden']);

        if ($respuesta) {

            $lista['mensaje'] = array("Orden registrado correctamente");
        } else {

            $lista['mensaje'] = array("No se ha podido registrar el orden");
        }

        $lista['lista'] = $insectosModel->obtenerOrdenes();

        $this->view->show("registrarinsectoView.php", $lista);
    }

    public function registrarAlmacen(){
        
       require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarAlmacen($_POST['almacen']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
        
    }
    
    public function registrarFamilia() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarFamilia($_POST['familia'], $_POST['orden']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
    }

    public function registrarSubfamilia() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarSubfamilia($_POST['subfamilia'], $_POST['familia']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
    }

    public function registrarGenero() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarGenero($_POST['genero'], $_POST['subfamilia']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
    }

    public function registrarEspecie() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $respuesta = $insectosModel->registrarEspecie($_POST['especie'], $_POST['genero']);

        if ($respuesta) {

            $mensaje = "Registrado correctamente";
        } else {

            $mensaje = "No se ha podido registrar";
        }

        echo $mensaje;
    }

    public function listarFamiliasAjax() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista = $insectosModel->listarFamilias($_POST['orden']);

        echo json_encode($lista);
    }

    public function listarSubfamiliasAjax() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista = $insectosModel->listarSubfamilias($_POST['familia']);

        echo json_encode($lista);
    }

    public function listarGenerosAjax() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista = $insectosModel->listarGeneros($_POST['subfamilia']);

        echo json_encode($lista);
    }

    public function listarEspeciesAjax() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista = $insectosModel->listarEspecies($_POST['genero']);

        echo json_encode($lista);
    }

    public function mostrarRegistrarInsecto() {

        require 'model/InsectosModel.php';

        $insectosModel = new InsectosModel();

        $lista['lista'] = $insectosModel->obtenerOrdenes();

        $lista['almacen'] = $insectosModel->listarAlmacenes();
        
        $this->view->show("registrarinsectoView.php", $lista);
    }

    public function buscarInsectosEG() {
        require 'model/InsectosModel.php';
        $insectosModel = new InsectosModel();
        $lista['lista'] = $insectosModel->buscarEspecieGenero($_POST['NombreEG']);

        $this->view->show("buscarespecimenView.php", $lista);
    }

    public function buscarInsectoOrden() {
        require 'model/InsectosModel.php';
        $insectosModel = new InsectosModel();
        $lista['lista'] = $insectosModel->buscarOrden($_POST['NombreO']);

        $this->view->show("buscarordenView.php", $lista);
    }

    public function buscarFamiliaRelacion() {
        require 'model/InsectosModel.php';
        $insectosModel = new InsectosModel();
        $lista['lista'] = $insectosModel->buscarFamiliaRelacion($_POST['id']);

        $this->view->show("buscarfamiliaView.php", $lista);
    }

    public function buscarInsectoFamilia() {
        require 'model/InsectosModel.php';
        $insectosModel = new InsectosModel();
        if (isset($_POST['NombreF'])) {
            $lista['lista'] = $insectosModel->buscarFamilia($_POST['NombreF']);
            $this->view->show("buscarfamiliaView.php", $lista);
        } else {
            $this->view->show("buscarfamiliaView.php", null);
        }
    }
     public function buscarInsectoSubfamilia() {
        require 'model/InsectosModel.php';
        $insectosModel = new InsectosModel();
        if (isset($_POST['NombreS'])) {
            $lista['lista'] = $insectosModel->buscarSubFamilia($_POST['NombreS']);
            $this->view->show("buscarsubfamiliaView.php", $lista);
        } else {
            $this->view->show("buscarsubfamiliaView.php", null);
        }
    }
    
    public function buscarSubfamiliaRelacion() {
       require 'model/InsectosModel.php';
        $insectosModel = new InsectosModel();
        $lista['lista'] = $insectosModel->buscarSubfamiliaRelacion($_POST['id']);
        $this->view->show("buscarsubfamiliaView.php", $lista); 
    }
    public function buscarGeneroRelacion() {
       require 'model/InsectosModel.php';
        $insectosModel = new InsectosModel();
        $lista['lista'] = $insectosModel->buscarGeneroRelacion($_POST['id']);
        $this->view->show("buscarespecimenView.php", $lista); 
    }

}
