<?php
/* Smarty version 3.1.30, created on 2018-02-25 02:09:38
  from "C:\wamp\www\trabajo\modulos\admin\templates\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a921ae2ba53f7_57723744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b85438ab23ede3f92f34c7769da943bf7b2e13f' => 
    array (
      0 => 'C:\\wamp\\www\\trabajo\\modulos\\admin\\templates\\admin.html',
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
function content_5a921ae2ba53f7_57723744 (Smarty_Internal_Template $_smarty_tpl) {
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
