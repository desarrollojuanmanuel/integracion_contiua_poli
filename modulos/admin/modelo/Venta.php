<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/lib/db/config/DAO.php';

/**
 * Description of Venta
 *
 * @author asus
 */
class Venta extends DAO {

    private $id_venta;
    private $id_persona;
    private $id_producto;

    function __construct() {
        $this->_nametable = 'venta';
        $this->_engine = 'InnoDB';
        parent::__construct();
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function arraymap() {
        $this->_arraymap = array(
            "id_persona" => $this->id_persona,
            "id_producto" => $this->id_producto
        );
    }
    
    /**
     * Método para insertar un nuevo registro
     */
    public function crearVenta() {
        $this->tipoerror = 'crear_venta';
        $this->_engine = 'MyISAM';
        $res = $this->create();
        $this->setId_venta($this->lasinsert);
    }

    function getId_venta() {
        return $this->id_venta;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function setId_venta($id_venta) {
        $this->id_venta = $id_venta;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }



}
