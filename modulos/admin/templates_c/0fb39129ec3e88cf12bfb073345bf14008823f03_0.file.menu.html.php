<?php
/* Smarty version 3.1.30, created on 2018-02-25 18:02:10
  from "C:\wamp\www\trabajo\modulos\admin\templates\menu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a92fa22597de4_82427281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fb39129ec3e88cf12bfb073345bf14008823f03' => 
    array (
      0 => 'C:\\wamp\\www\\trabajo\\modulos\\admin\\templates\\menu.html',
      1 => 1519581592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a92fa22597de4_82427281 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul>
    <li><a>HOLA <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 SESION INICADA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
    <li><a href="CrearUsuario.php">Crear Usuario</a></li>
    <li><a href="editarUsuario.php">Editar Usuario</a></li>
    <li><a href="crearProducto.php">Crear Producto</a></li>
    <li><a href="ventas.php">Ventas</a></li>
    <li><a href="index.php?session=close">Cerrar sesion</a></li>
</ul><?php }
}
