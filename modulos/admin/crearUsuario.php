<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/class/ClassSmarty.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/class/tablahtml.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/modulos/admin/modelo/Persona.php';
/**
 * Description of crearUsuario
 *
 * @author asus
 */
class crearUsuario extends ClassSmarty {

    public $data;

    /**
     * Metedo constructor de la clase
     */
    public function __construct($data) {
        $this->data = $data;
        parent::__construct();
        (empty($this->data)) ? $this->vista1() : $this->addUsuario();
    }

    private function addUsuario() {
        $Persona = new Persona();
        $Persona->setCedula($this->data['cedula']);
        $Persona->setNombre($this->data['nombre']);
        $Persona->setUsuario($this->data['usuario']);
        $Persona->setPasword($this->data['pasword']);
        $res = $Persona->crearPersona();
        if(!$res){
            echo '<h2>El usuario o el documento ya estan registrados </h2>';
        }else{
            echo '<h2>Usuario registrado con exito</h2>';
        }
        $this->vista1();
        
        
    }

    private function vista1() {
        $Persona = new Persona();
        $this->_smarty->assign("tabla_html", array2table($Persona->listarPersonas()));
        $this->_smarty->assign("msj", "");
        $this->_smarty->assign("user", strtoupper($_SESSION['user']));
        $this->_smarty->display('crearUsuario.html');
    }

}

$crearUsuario = new crearUsuario($_POST);
