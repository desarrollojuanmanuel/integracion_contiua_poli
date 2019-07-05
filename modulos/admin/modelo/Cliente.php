<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/lib/db/config/DAO.php';

/**
 * Description of Cliente
 *
 * @author asus
 */
class Cliente extends DAO {

    private $idcliente;
    private $nombre;

    function __construct() {
        $this->_nametable = 'cliente';
        $this->_engine = 'InnoDB';
        parent::__construct();
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function arraymap() {
        $this->_arraymap = array(
            "id_cliente" => $this->idcliente,
            "nombre" => $this->nombre
        );
    }

    /**
     * Método para insertar un nuevo registro
     */
    public function crearCliente() {
        $this->tipoerror = 'crear_cliente';
        $this->_engine = 'MyISAM';
        $res = $this->create();
        $this->setIdcliente($this->lasinsert);
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
