<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/lib/db/config/DAO.php';

/**
 * Description of Producto
 *
 * @author asus
 */
class Producto extends DAO {

    //id_producto nombre cantidad Precio
    private $id_producto;
    private $nombre;
    private $cantidad;
    private $precio;

    function __construct() {
        $this->_nametable = 'producto';
        $this->_engine = 'InnoDB';
        parent::__construct();
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function arraymap() {
        $this->_arraymap = array(
            "nombre" => $this->nombre,
            "cantidad" => $this->cantidad,
            "Precio" => $this->precio,
        );
    }

    /**
     * Método para insertar un nuevo registro
     */
    public function crearProducto() {
        $this->tipoerror = 'crear_pruducto';
        $this->_engine = 'MyISAM';
        $res = $this->create();
        return $res;
    }

    public function actualizarCantidadProducto() {
        $this->_SQL = "UPDATE producto SET  cantidad = :cantidad WHERE id_producto = :id_producto";
        $this->_arrayvalues[':id_producto'] = $this->id_producto;
        $this->_arrayvalues[':cantidad'] = $this->cantidad;
        $this->transacctionOFF();
    }

    /**
     * Método que genera una nueva condición para actualizar o eliminar
     */
    public function listarProducto() {
        $this->_namefilecondition = "id_producto";
        $this->_order = "desc";
        $this->_engine = 'MyISAM';
        $this->selectAll();
        return $this->_alldata;
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

}
