<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validate
 *
 * @author jgutierrez
 */
class Validate {

    protected $_expregnumber;
    protected $_expregstring;
    protected $_expregsdireccion;
    protected $_expregsemail;
    protected $_expalphanumeric;
    protected $_idvalidatestatus;
    protected $_inputstatus;

    protected function __construct() {
        $this->regularExpression();
        $this->stateValidate();
    }

    protected function encodeString($param) {
        return utf8_encode($param);
    }

    /**
     * Metodo encargado de estbabecer el input el id para el estado de la validacion
     */
    private function stateValidate() {
        $this->_idvalidatestatus = 'idinputsatatevalidate';
        $this->_inputstatus = "<input type='text' id='$this->_idvalidatestatus' value=''/>";
        
    }

    /**
     * Metodo encargado de establecer a los atributos las expresiones regulares
     */
    private function regularExpression() {

        $this->_expregnumber = '/^[0-9]+$/';
        $this->_expalphanumeric = '/^[a-zA-Z-0-9]+$/';
        $this->_expregstring = '/^[a-áéíóúzA-Z ]+$/';
        $this->_expregsdireccion = '/^[a-zA-Z-0-9-# ]+$/';
        $this->_expregsemail = '/^[a-zA-z0-9.-]+\@[a-zA-z0-9.-]+.[a-zA-Z]+$/';
    }

}
