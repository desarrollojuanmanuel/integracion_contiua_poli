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
    public $persona;

    /**
     * Metedo constructor de la clase
     */
    public function __construct($data) {
        $this->data = $data;
        parent::__construct();
        $this->persona = new Persona();
        if (empty($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = $this->persona->listarPersonas();
        }
        $this->definirAccion();
    }

    private function definirAccion() {
        if (!empty($this->data)) {
            switch ($this->data['accion']) {
                case 'consulta':
                    $data = $this->persona->consultarPerosona('cedula', $this->data['cedula']);
                    $this->vista2($data);
                    break;
                case 'editar':
                    $this->persona->setCedula($this->data['cedula']);
                    $this->persona->setNombre($this->data['nombre']);
                    $this->persona->setUsuario($this->data['usuario']);
                    $this->persona->setPasword($this->data['pasword']);
                    $res = $this->persona->editarPersona();
                    ($res) ? $msj = 'El usuario se ha editado' : $msj = 'Error el usuario ya existe';

                    $this->vista1($msj);
                    break;
                case 'eliminar':
                    $this->persona->setCedula($this->data['ced']);
                    $this->persona->setUsuario($this->data['usuer']);
                    $res = $this->persona->eliminarPersona();
                    (!$res) ? $msj = 'usuario eliminado' : $msj = 'Error no puedo ser eliminado';
                    $this->vista1($msj);
                    break;

                default:
                    break;
            }
        } else {
            $this->vista1();
        }
    }

    private function vista2($data, $msj = '') {

        $this->_smarty->assign("tabla_html", array2table($this->persona->listarPersonas()));
        $this->_smarty->assign("usuarios", $this->persona->listarPersonas());
        $this->_smarty->assign("cedula", $data[0]['cedula']);
        $this->_smarty->assign("nombre", $data[0]['nombre']);
        $this->_smarty->assign("usuario", $data[0]['usuario']);
        $this->_smarty->assign("pasword", $data[0]['pasword']);
        $this->_smarty->assign("msj", $msj);
        $this->_smarty->assign("user", strtoupper($_SESSION['user']));
        $this->_smarty->display('editarUsuario.html');
    }

    private function vista1($msj = '') {
        
        $this->_smarty->assign("tabla_html", array2table($this->persona->listarPersonas()));
        $this->_smarty->assign("usuarios", $this->persona->listarPersonas());
        $this->_smarty->assign("cedula", "");
        $this->_smarty->assign("nombre", "");
        $this->_smarty->assign("usuario", "");
        $this->_smarty->assign("pasword", "");
        $this->_smarty->assign("msj", $msj);
        $this->_smarty->assign("user", strtoupper($_SESSION['user']));
        $this->_smarty->display('editarUsuario.html');
    }


}

$crearUsuario = new crearUsuario($_POST);
