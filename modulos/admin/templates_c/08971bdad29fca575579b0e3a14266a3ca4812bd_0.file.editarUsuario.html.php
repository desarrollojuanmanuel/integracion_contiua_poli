<?php
/* Smarty version 3.1.30, created on 2018-03-01 22:25:00
  from "C:\wamp64\www\trabajo\modulos\admin\templates\editarUsuario.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a987dbc027d04_53043331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08971bdad29fca575579b0e3a14266a3ca4812bd' => 
    array (
      0 => 'C:\\wamp64\\www\\trabajo\\modulos\\admin\\templates\\editarUsuario.html',
      1 => 1519575783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:menu.html' => 1,
  ),
),false)) {
function content_5a987dbc027d04_53043331 (Smarty_Internal_Template $_smarty_tpl) {
?>
<meta charset="UTF-8">
<?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="after-box">
    <form id="sesion" method="post" action="editarUsuario.php" style="padding-bottom: 9.5em;width: 400;">
        <h2>Seleccionar usuario</h2>    
        <select name="cedula" required> 
            <option value="">seleccione</option> 
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'gmtr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gmtr']->value) {
?> 
            <option value="<?php echo $_smarty_tpl->tpl_vars['gmtr']->value['cedula'];?>
"><?php echo $_smarty_tpl->tpl_vars['gmtr']->value['nombre'];?>
</option> 
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
        </select>
        <input type="hidden"  name="accion" value="consulta">
        <input type="submit" value="CONSULTAR USUARIO">
    </form>
</div>
<div class="after-box">
    <form id="sesion" method="post" action="editarUsuario.php" style="padding:;width: 400;">
        <h2>Formulario de edicion</h2>
        <label> Nombre</label><br/>
        <input type="hidden" name="cedula" value="<?php echo $_smarty_tpl->tpl_vars['cedula']->value;?>
" required>
        <input type="text" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" required><br/>
        <label> Usuario</label><br/>
        <input type="text" name="usuario" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
" required><br/>
        <label> Contraseña</label><br/>
        <input type="password" name="pasword"  value="<?php echo $_smarty_tpl->tpl_vars['pasword']->value;?>
" required><br/><br/>
        <input type="hidden"  name="accion" value="editar">
        <input type="submit" value="EDITAR USUARIO">
        <?php echo $_smarty_tpl->tpl_vars['msj']->value;?>

    </form>
</div>
<div class="after-box">
    <form id="sesion" method="post" action="editarUsuario.php" style="padding-bottom: 4em;width:400;">
        <h2>Formulario de Eliminar</h2>
        <label> Nombre</label><br/>
        <input type="text" name="ced" value="<?php echo $_smarty_tpl->tpl_vars['cedula']->value;?>
" readonly><br/>
        <label> Usuario</label><br/>
        <input type="text" name="usuer" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
" readonly><br/>
        <input type="hidden"  name="accion" value="eliminar">
        <input type="submit" value="ELIMINAR USUARIO">
        <?php echo $_smarty_tpl->tpl_vars['msj']->value;?>

    </form>

</div> 
    <h2>listado Usuarios</h2>
    <?php echo $_smarty_tpl->tpl_vars['tabla_html']->value;?>

</body>
</html>        <?php }
}
