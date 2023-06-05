<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CulticoModel
 *
 * @author drey0
 */
class CultivoModel {
     private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::getInstance();
    }
    
    public function registrarCultivo($nombre) {

        $consulta = $this->db->prepare("call sp_registra_cultivo('" . $nombre . "')");
        $resultado = $consulta->execute();
        return $resultado;
    }
    
    
}
