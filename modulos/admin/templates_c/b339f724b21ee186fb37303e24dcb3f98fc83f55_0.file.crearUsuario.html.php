<?php
/* Smarty version 3.1.30, created on 2018-02-25 16:27:43
  from "C:\wamp\www\trabajo\modulos\admin\templates\crearUsuario.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a92e3ff1978f8_31732674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b339f724b21ee186fb37303e24dcb3f98fc83f55' => 
    array (
      0 => 'C:\\wamp\\www\\trabajo\\modulos\\admin\\templates\\crearUsuario.html',
      1 => 1519576062,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:menu.html' => 1,
  ),
),false)) {
function content_5a92e3ff1978f8_31732674 (Smarty_Internal_Template $_smarty_tpl) {
?>
<meta charset="UTF-8">
<?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="cont" style="">
    <h2>Crear Usuario</h2>
        <form id="sesion" method="post" action="crearUsuario.php">
            <label> Cedula</label><br/>
            <input type="text" name="cedula" required><br/>
            <label> Nombre</label><br/>
            <input type="text" name="nombre" required><br/>
            <label> Usuario</label><br/>
            <input type="text" name="usuario" required><br/>
            <label> Contraseña</label><br/>
            <input type="password" name="pasword" required><br/><br/>
            <input type="submit" value="NUEVO USUARIO">
            <?php echo $_smarty_tpl->tpl_vars['msj']->value;?>

        </form>
        <?php echo $_smarty_tpl->tpl_vars['tabla_html']->value;?>

</div>   
</body>
</html>        <?php }
}
