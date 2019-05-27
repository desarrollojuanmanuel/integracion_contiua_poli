<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/class/ClassSmarty.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/class/tablahtml.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/modulos/admin/modelo/Producto.php';

/**
 * Description of crearUsuario
 *
 * @author asus
 */
class crearProducto extends ClassSmarty {

    public $data;

    /**
     * Metedo constructor de la clase
     */
    public function __construct($data) {
        $this->data = $data;
        parent::__construct();
        (empty($this->data)) ? $this->vista1() : $this->addProducto();
    }

    private function addProducto() {
        $Producto = new Producto();
        $Producto->setNombre($this->data['nombre']);
        $Producto->setCantidad($this->data['cantidad']);
        $Producto->setPrecio($this->data['precio']);
        $res = $Producto->crearProducto();
        sleep(0.5);
        header("Location: crearProducto.php");
    }

    private function vista1() {
        $Producto = new Producto();
        $tabla = '';
        if (count($Producto->listarProducto()) > 0) {
            $tabla = array2table($Producto->listarProducto());
        }
        $this->_smarty->assign("tabla_html", $tabla);
        $this->_smarty->assign("msj", "");
        $this->_smarty->assign("user", strtoupper($_SESSION['user']));
        $this->_smarty->display('crearProducto.html');
    }

}

$crearUsuario = new crearProducto($_POST);
