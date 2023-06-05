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

    public function obtenerGeneros() {

        $consulta = $this->db->prepare("call sp_obtener_generos()");
        $resultado = $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function obtenerCultivos() {

        $consulta = $this->db->prepare("call sp_obtener_cultivos()");
        $resultado = $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function registrarGeneroCultivo($id_genero,$id_cultivo) {

        $consulta = $this->db->prepare("call sp_registrar_genero_cultivo(" . $id_genero . ",".$id_cultivo.")");
        $resultado = $consulta->execute();
        return $resultado;
    }
}
