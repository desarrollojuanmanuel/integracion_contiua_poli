<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config/PDOext.php';

/**
 * Description of conexion
 *
 * @author jgutierrez
 */
class conexion extends PDOext {

    protected $_PDO;

    /**
     * 
     */
    public function __construct() {
        $this->_PDO = PDOext::getInstance();
    }

}
