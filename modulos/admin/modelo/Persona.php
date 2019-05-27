<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/lib/db/config/DAO.php';

/**
 * Description of Persona
 *
 * @author asus
 */
class Persona extends DAO {

    private $cedula;
    private $nombre;
    private $usuario;
    private $pasword;

    /**
     * Constructor de la clase
     */
    public function __construct() {
        $this->_nametable = 'persona';
        $this->_engine = 'MyISAM';
        parent::__construct();
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function arraymap() {
        $this->_arraymap = array(
            "cedula" => $this->cedula,
            "nombre" => $this->nombre,
            "usuario" => $this->usuario,
            "pasword" => $this->pasword
        );
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function consultaUsuario() {
        $this->_SQL = "SELECT nombre user FROM persona WHERE usuario = :usuario AND pasword = :pasword";
        $this->_arrayvalues[':usuario'] = $this->usuario;
        $this->_arrayvalues[':pasword'] = $this->pasword;
        $this->transacction();
        (count($this->_alldata)) ? $_SESSION['user'] = $this->_alldata[0]['user'] : '';
        return count($this->_alldata);
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function editarPersona() {
        $this->_arraymap['usuario'] = $this->usuario;
        $this->selectCondition();

        if (!$this->_alldata) {
            $this->_SQL = "UPDATE persona SET  usuario = :usuario, nombre = :nombre, pasword = :pasword  WHERE cedula = :cedula";
            $this->_arrayvalues[':nombre'] = $this->nombre;
            $this->_arrayvalues[':usuario'] = $this->usuario;
            $this->_arrayvalues[':pasword'] = $this->pasword;
            $this->_arrayvalues[':cedula'] = $this->cedula;
            $this->transacctionOFF();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método sobre escrito 
     * @param type transactioninterface
     */
    public function eliminarPersona() {

        $this->_SQL = "DELETE FROM  persona  WHERE cedula = :cedula";
        $this->_arrayvalues[':cedula'] = $this->cedula;
        $this->transacctionOFF();
    }

    /**
     * Método para insertar un nuevo registro
     */
    public function crearPersona() {
        $this->_arraymap['usuario'] = $this->usuario;
        $this->selectCondition();
        if (!$this->_alldata) {
            $this->tipoerror = 'crear_persona';
            $res = $this->create();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método que genera una nueva condición para actualizar o eliminar
     */
    public function listarPersonas() {
        $this->_namefilecondition = "cedula";
        $this->_order = "desc";
        $this->selectAll();
        return $this->_alldata;
    }

    public function consultarPerosona($campo, $valor) {
        $this->_arraymap[$campo] = $valor;
        $this->_allasocnum = true;
        $this->selectCondition();
        return $this->_alldata;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPasword() {
        return $this->pasword;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPasword($pasword) {
        $this->pasword = $pasword;
    }

}
