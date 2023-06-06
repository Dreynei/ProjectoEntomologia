<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of InsectosModel
 *
 * @author Miguel
 */
class InsectosModel {

    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::getInstance();
    }

// constructor

    public function obtenerOrdenes() {

        $consulta = $this->db->prepare("call sp_listar_ordenes()");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function registrarImagen($nombre, $tipo, $tamanno, $rutaTemporal) {

        $contenidoArchivo = file_get_contents($rutaTemporal);

        $consulta = $this->db->prepare("CALL sp_registrar_imagen(:nombre, :tipo, :tamanno, :contenido)");
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':tipo', $tipo);
        $consulta->bindParam(':tamanno', $tamanno);
        $consulta->bindParam(':contenido', $contenidoArchivo);
        $consulta->execute();

        $consulta2 = $this->db->prepare("CALL sp_ultima_imagen()");
        $consulta2->execute();

        $resultado = $consulta2->fetchColumn();

        return $resultado;
    }

    public function registrarGabinete($idGabinete){
        
        $consulta = $this->db->prepare("call sp_registrar_gabinete(".$idGabinete.")");

        $resultado = $consulta->execute();

        return $resultado;
        
    }
    
    public function registrarCaja($idCaja){
        
        $consulta = $this->db->prepare("call sp_registrar_caja(".$idCaja.")");

        $resultado = $consulta->execute();

        return $resultado;
        
    }
    
    public function registrarGaveta($idGabinete, $idGaveta){
        
        $consulta = $this->db->prepare("call sp_registrar_gabeta(".$idGabinete.",".$idGaveta.")");

        $resultado = $consulta->execute();

        return $resultado;
        
    }
    
    public function registrarVial($idCaja, $idVial){
        
        $consulta = $this->db->prepare("call sp_registrar_vial(".$idCaja.",".$idVial.")");

        $resultado = $consulta->execute();

        return $resultado;
        
    }
    
    public function registrarInsecto($nombreImagen, $tipoImagen, $tamannoImagen, $rutaTemporal,
            $recolector, $pais, $provincia, $canton, $distrito, $fecha, $especie, $almacen, $gabineteOC,
            $gavetaOV){
        //normalizar la fecha
        $fecha_filtro1 = str_replace('/', '-', $fecha);
        $fecha_filtro2 = str_replace('.', '-', $fecha_filtro1);
        $fecha_definitiva = date('Y-m-d', strtotime($fecha_filtro2));
        $contenidoArchivo = file_get_contents($rutaTemporal);
        //imagen
        
        $consulta = $this->db->prepare("CALL sp_registrar_insecto(:nombre_imagen, :tipo_imagen, :tamanno_imagen, :contenido_imagen, :recolector, :pais, :provincia, :canton, :distrito, :fecha, :especie, :almacen, :gabineteOC, :gabetaOV)");
                
        $consulta->bindParam(':nombre_imagen', $nombreImagen);
        $consulta->bindParam(':tipo_imagen', $tipoImagen);
        $consulta->bindParam(':tamanno_imagen', $tamannoImagen);
        $consulta->bindParam(':contenido_imagen', $contenidoArchivo);
        //recoleccion
        $consulta->bindParam(':recolector', $recolector);
        $consulta->bindParam(':pais', $pais);
        $consulta->bindParam(':provincia', $provincia);
        $consulta->bindParam(':canton', $canton);
        $consulta->bindParam(':distrito', $distrito);
        $consulta->bindParam(':fecha', $fecha_definitiva);
        $consulta->bindParam(':especie', $especie);
        
        $consulta->bindParam(':almacen', $almacen);
        
       
        $consulta->bindParam(':gabineteOC', $gabineteOC);
            
        $consulta->bindParam(':gabetaOV', $gavetaOV);
        
        //especimen
        $resultado = $consulta->execute();
        return $resultado;
    }
    
    
    public function mostrarImagen($especimen) {
        
       $consulta = $this->db->prepare("call sp_obtener_imagen('".$especimen."')");
       $consulta->execute();
        
       $resultado = $consulta->fetchAll();
        
       return $resultado;
    }

    public function listarGabetas($gabinete){
        
          
        $consulta = $this->db->prepare("call sp_listar_gabetas(".$gabinete.")");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
        
    }
    
    public function listarCajas(){
        
        $consulta = $this->db->prepare("call sp_listar_cajas()");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
        
    }
    
    public function listarAlmacenes(){
        
        $consulta = $this->db->prepare("call sp_listar_almacenes()");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
        
    }
    
    public function listarViales($caja){
        
           
        $consulta = $this->db->prepare("call sp_listar_viales(".$caja.")");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
        
    }
    
    public function listarGabinetes(){
        
        $consulta = $this->db->prepare("call sp_listar_gabinetes()");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
        
    }
    
    public function listarFamilias($orden) {

        $consulta = $this->db->prepare("call sp_listar_familias('" . $orden . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function listarSubfamilias($familia) {

        $consulta = $this->db->prepare("call sp_listar_subfamilias('" . $familia . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function listarGeneros($subfamilia) {

        $consulta = $this->db->prepare("call sp_listar_generos('" . $subfamilia . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function listarEspecies($genero) {


        $consulta = $this->db->prepare("call sp_listar_especies('" . $genero . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function registrarOrden($orden) {

        $consulta = $this->db->prepare("call sp_registrar_orden('" . $orden . "')");

        $resultado = $consulta->execute();

        return $resultado;
    }

    public function registrarAlmacen($almacen){
        
        $consulta = $this->db->prepare("call sp_registrar_almacen('" . $almacen . "')");

        $resultado = $consulta->execute();

        return $resultado;
        
    }
    
    public function registrarFamilia($familia, $orden) {

        $consulta = $this->db->prepare("call sp_registrar_familia('" . $familia . "','" . $orden . "')");

        $resultado = $consulta->execute();

        return $resultado;
    }

    public function registrarSubfamilia($subfamilia, $familia) {

        $consulta = $this->db->prepare("call sp_registrar_subfamilia('" . $subfamilia . "','" . $familia . "')");

        $resultado = $consulta->execute();

        return $resultado;
    }

    public function registrarGenero($genero, $subfamilia) {

        $consulta = $this->db->prepare("call sp_registrar_genero('" . $genero . "','" . $subfamilia . "')");

        $resultado = $consulta->execute();

        return $resultado;
    }

    public function registrarEspecie($especie, $genero) {

        $consulta = $this->db->prepare("call sp_registrar_especie('" . $especie . "','" . $genero . "')");

        $resultado = $consulta->execute();

        return $resultado;
    }

    public function registrarRecoleccion($recolector, $pais, $provincia, $canton, $distrito, $fecha) {

        $fecha_filtro1 = str_replace('/', '-', $fecha);
        $fecha_filtro2 = str_replace('.', '-', $fecha_filtro1);
        $fecha_definitiva = date('Y-m-d', strtotime($fecha_filtro2));

        $consulta = $this->db->prepare("call sp_registrar_recoleccion('" . $recolector . "','" . $pais . "','" . $provincia . "','" . $canton . "','" . $distrito . "','" . $fecha_definitiva . "')");

        $consulta->execute();

        $consulta2 = $this->db->prepare("CALL sp_ultima_recoleccion()");
        $consulta2->execute();

        $resultado = $consulta2->fetchColumn();

        return $resultado;
    }

//    public function registrarInsecto($idImagen, $idRecoleccion, $especie) {
//
//        $consulta = $this->db->prepare("CALL sp_registrar_insecto(:idImagen, :idRecoleccion, :especie)");
//
//        $consulta->bindParam(':idImagen', $idImagen);
//        $consulta->bindParam(':idRecoleccion', $idRecoleccion);
//        $consulta->bindParam(':especie', $especie);
//        $resultado = $consulta->execute();
//
//        return $resultado;
//    }

    public function buscarEspecieGenero($nombre) {
        $consulta = $this->db->prepare("call sp_buscar_especie_genero('" . $nombre . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function buscarOrden($nombre) {
        $consulta = $this->db->prepare("call sp_buscar_orden('" . $nombre . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function buscarFamiliaRelacion($id) {
        $consulta = $this->db->prepare("call sp_buscar_familia_relacion(" . $id . ")");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function buscarFamilia($nombre) {
        $consulta = $this->db->prepare("call sp_buscar_familia('" . $nombre . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function buscarSubFamilia($nombre) {
        $consulta = $this->db->prepare("call sp_buscar_subfamilia('" . $nombre . "')");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function buscarSubfamiliaRelacion($id) {
        $consulta = $this->db->prepare("call sp_buscar_subfamil_relacion(" . $id . ")");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function buscarGeneroRelacion($id) {
        $consulta = $this->db->prepare("call sp_buscar_genero_relacion(" . $id . ")");

        $consulta->execute();

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

}
