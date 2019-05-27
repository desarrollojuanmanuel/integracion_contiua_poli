<?php
/* Smarty version 3.1.30, created on 2018-03-01 22:25:07
  from "C:\wamp64\www\trabajo\modulos\admin\templates\crearProducto.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a987dc3c9f275_71769746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fa0bef3f057ff7c09ef5da34a0d3b1bcd0217cb' => 
    array (
      0 => 'C:\\wamp64\\www\\trabajo\\modulos\\admin\\templates\\crearProducto.html',
      1 => 1519580349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:menu.html' => 1,
  ),
),false)) {
function content_5a987dc3c9f275_71769746 (Smarty_Internal_Template $_smarty_tpl) {
?>
<meta charset="UTF-8">
<?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="cont" style="">
    <h2>Crear Producto</h2>
        <form id="sesion" method="post" action="crearProducto.php">
            <label> Nombre</label><br/>
            <input type="text" name="nombre" required><br/>
            <label> cantidad</label><br/>
            <input type="text" name="cantidad" required><br/>
            <label> precio</label><br/>
            <input type="text" name="precio" required><br/><br/>
            <input type="submit" value="CREAR PRODUCTO">
            <?php echo $_smarty_tpl->tpl_vars['msj']->value;?>

        </form>
        <?php echo $_smarty_tpl->tpl_vars['tabla_html']->value;?>

</div>   
</body>
</html>        <?php }
}
