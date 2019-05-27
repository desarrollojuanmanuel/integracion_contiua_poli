<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/lib/db/config/DAO.php';

/**
 * Description of detalle_venta
 *
 * @author juan m g
 */
class DetalleVenta extends DAO {

    private $id_detalle;
    private $id_venta;
    private $subtotal;
    private $impuesto;
    private $descuento;
    private $total;

    function __construct() {
        $this->_nametable = 'detalle_venta';
        $this->_engine = 'InnoDB';
        parent::__construct();
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function arraymap() {
        $this->_arraymap = array(
            "id_venta" => $this->id_venta,
            "subtotal" => $this->subtotal,
            "impuesto" => $this->impuesto,
            "descuento" => $this->descuento,
            "total" => $this->total
        );
    }
    
    /**
     * Método para insertar un nuevo registro
     */
    public function crearDetalleVenta() {
        $this->tipoerror = 'crear_venta';
        $this->_engine = 'MyISAM';
        $res = $this->create();
        $this->setId_venta($this->lasinsert);
    }
    
    /**
     * Método que genera una nueva condición para actualizar o eliminar
     */
    public function listarDetalleVenta() {
        $this->_namefilecondition = "id_detalle";
        $this->_order = "desc";
        $this->_engine = 'MyISAM';
        $this->selectAll();
        return $this->_alldata;
    }

    function getId_detalle() {
        return $this->id_detalle;
    }

    function getId_venta() {
        return $this->id_venta;
    }

    function getSubtotal() {
        return $this->subtotal;
    }

    function getImpuesto() {
        return $this->impuesto;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getTotal() {
        return $this->total;
    }

    function setId_detalle($id_detalle) {
        $this->id_detalle = $id_detalle;
    }

    function setId_venta($id_venta) {
        $this->id_venta = $id_venta;
    }

    function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    function setImpuesto($impuesto) {
        $this->impuesto = $impuesto;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setTotal($total) {
        $this->total = $total;
    }

}
