<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'cofig.inc';
require_once $_SERVER['DOCUMENT_ROOT'] . "/". $GLOBALS['work'] . '/class/ClassSmarty.php';

/**
 * Description of index
 *
 * @author Hanssen Avelino, Miguel Maceta, Juan M. Gutierrez
 */
class ClassHome extends ClassSmarty {

    public $data;

    /**
     * Metedo constructor de la clase
     */
    public function __construct() {
        parent::__construct();
        (isset($_GET['session']) && $_GET['session'] == 'close') ? $this->cerrarSesion() : $this->validarSession();
    }

    private function cerrarSesion() {
        session_destroy();
        $this->vista1();
    }

    private function validarSession() {
        (isset($_SESSION) && !empty($_SESSION['user'])) ? $this->vista2() : $this->metodoDeAccion();
    }

    private function metodoDeAccion() {
        (isset($_POST)) ? $this->data = $_POST : $this->data['accion'] = 'null';
        if (!empty($_POST)) {
            switch ($this->data['accion']) {
                case 'login':
                    $this->iniciarSession();
                    break;
            }
        } else {
            $this->vista1();
        }
    }

    private function iniciarSession() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/". $GLOBALS['work'] . '/modulos/admin/modelo/Persona.php';
        $Persona = new Persona();
        $Persona->setUsuario($this->data['user']);
        $Persona->setPasword($this->data['pass']);
        $res = $Persona->consultaUsuario();
        if ($res) {
            $this->vista2();
        } else {
            $this->_smarty->assign("msj_err", "datos incorrectos");
            $this->_smarty->assign("est_log", "");
            $this->_smarty->assign("est", "none");
            $this->_smarty->display('admin.html');
        }
    }

    /**
     * Metodo encargado de cargar la vista
     */
    private function vista2() {
        $this->_smarty->assign("user", strtoupper($_SESSION['user']));
        $this->_smarty->assign("est", "");
        $this->_smarty->assign("est_log", "none");
        $this->_smarty->display('admin.html');
    }

    /**
     * Metodo encargado de cargar la vista
     */
    private function vista1() {
        $this->_smarty->assign("est_log", "");
        $this->_smarty->assign("est", "none");
        $this->_smarty->assign("msj_err", "");
        $this->_smarty->display('admin.html');
    }

}

$ClassHome = new ClassHome();
