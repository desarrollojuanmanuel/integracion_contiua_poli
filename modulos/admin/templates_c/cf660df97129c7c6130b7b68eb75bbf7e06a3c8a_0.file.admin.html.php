<?php
/* Smarty version 3.1.30, created on 2018-03-01 22:21:52
  from "C:\wamp64\www\trabajo\modulos\admin\templates\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a987d0077d717_44408436',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf660df97129c7c6130b7b68eb75bbf7e06a3c8a' => 
    array (
      0 => 'C:\\wamp64\\www\\trabajo\\modulos\\admin\\templates\\admin.html',
      1 => 1519524577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:menu.html' => 1,
  ),
),false)) {
function content_5a987d0077d717_44408436 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


        <div id="menu" style="display: <?php echo $_smarty_tpl->tpl_vars['est']->value;?>
">
            <?php $_smarty_tpl->_subTemplateRender("file:menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <div class="cont" style="display:<?php echo $_smarty_tpl->tpl_vars['est_log']->value;?>
">
            <h2>INICIAR SESION</h2>
            <form id="sesion" method="post" action="index.php">
                <label> Usuario</label>
                <input type="text" name="user">
                <label> Contraseña</label>
                <input type="password" name="pass">
                <input type="submit" value="INGRESAR">
                <input type="hidden" name="accion" value="login">
                <?php echo $_smarty_tpl->tpl_vars['msj_err']->value;?>

            </form>
        <div>
    </body>
</html><?php }
}
