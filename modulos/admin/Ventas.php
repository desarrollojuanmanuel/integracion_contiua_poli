<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/class/ClassSmarty.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/class/tablahtml.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/modulos/admin/modelo/DetalleVenta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/modulos/admin/modelo/Venta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/modulos/admin/modelo/Producto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/modulos/admin/modelo/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/trabajo/modulos/admin/modelo/Producto.php';

/**
 * Description of Ventas
 *
 * @author asus
 */
class Ventas extends ClassSmarty {

    public $data;
    private $Producto;

    /**
     * Venta
     * @var type 
     */
    private $Venta;
    private $Cliente;

    /**
     * DetalleVenta
     * @var type 
     */
    private $detalleVenta;

    /**
     * Metedo constructor de la clase
     */
    public function __construct($data) {
        $this->data = $data;
        $this->Producto = new Producto();
        $this->detalleVenta = new DetalleVenta();
        parent::__construct();
        (empty($this->data)) ? $this->vista1() : $this->addVenta();
    }

    private function addVenta() {
        $this->Venta = new Venta();
        $this->Cliente = new Cliente();
        $this->NuevoCliente();
        $this->NuevaVenta();
        $this->nuevoDetalleVenta();
        $this->actualizarProducto();
        sleep(0.5);
        header("Location: Ventas.php");
    }

    private function actualizarProducto() {
        $this->Producto->setCantidad($this->data['can_pro'] - $this->data['cantidad']);
        $this->Producto->setId_producto($this->data['idproducto']);
        $this->Producto->actualizarCantidadProducto();
    }

    private function nuevoDetalleVenta() {
        $this->detalleVenta->setId_venta($this->Venta->getId_venta());
        $this->detalleVenta->setSubtotal($this->data['sub']);
        $this->detalleVenta->setImpuesto($this->data['impuestos']);
        $this->detalleVenta->setDescuento($this->data['descuento']);
        $this->detalleVenta->setTotal($this->data['total']);
        $this->detalleVenta->crearDetalleVenta();
    }

    private function NuevaVenta() {
        $this->Venta->setId_persona($this->Cliente->getIdcliente());
        $this->Venta->setId_producto($this->data['idproducto']);
        $this->Venta->crearVenta();
    }

    private function NuevoCliente() {
        $this->Cliente->setNombre($this->data['nombre']);
        $this->Cliente->crearCliente();
    }

    private function vista1() {
        $tabla = '';
        if (count($this->detalleVenta->listarDetalleVenta()) > 0) {
            $tabla = array2table($this->detalleVenta->listarDetalleVenta());
        }
        $this->_smarty->assign("tabla_html", $tabla);
        $this->_smarty->assign("productos", $this->Producto->listarProducto());
        $this->_smarty->assign("user", strtoupper($_SESSION['user']));
        $this->_smarty->display('venta.html');
    }

}

$venta = new Ventas($_POST);
