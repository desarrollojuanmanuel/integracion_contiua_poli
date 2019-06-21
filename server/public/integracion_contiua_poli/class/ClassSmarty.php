<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 require 'cofig.inc';

require_once $_SERVER['DOCUMENT_ROOT'] .  "/". $GLOBALS['work'] .'/lib/smarty/libs/Smarty.class.php';

/**
 * Description of adminview
 *
 * @author jgutierrez
 */
class ClassSmarty{

    /**
     * Objeto Smarty
     * @var Smarty
     */
    protected $_smarty;

    /**
     * Constructor de la clase
     */
    protected function __construct() {
        $this->_smarty = new Smarty();
    }

}
