<?php
/* Smarty version 3.1.30, created on 2018-03-01 22:25:11
  from "C:\wamp64\www\trabajo\modulos\admin\templates\venta.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a987dc7e097b2_37405254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93a43919b949a762e9a2a36bd8bf0c3d4c3d1979' => 
    array (
      0 => 'C:\\wamp64\\www\\trabajo\\modulos\\admin\\templates\\venta.html',
      1 => 1519597058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:menu.html' => 1,
  ),
),false)) {
function content_5a987dc7e097b2_37405254 (Smarty_Internal_Template $_smarty_tpl) {
?>
<meta charset="UTF-8">
<?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="cont" style="">
    <h2>Detalle de venta</h2>
    <form id="sesion" method="post" action="Ventas.php">
        <label> Nombre Cliente</label><br/>
        <input type="text" id="nombre" name="nombre" onblur="validaNombre(this.value)" required><br/>
        <label> Seleccione Producto</label><br/>
        <select onchange="cargarPrecio(this.value);" name="idproducto" required> 
            <option value="">seleccione</option> 
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'gmtr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gmtr']->value) {
?> 
            <?php if ($_smarty_tpl->tpl_vars['gmtr']->value['cantidad'] > 0) {?>
            <option  value="<?php echo $_smarty_tpl->tpl_vars['gmtr']->value['id_producto'];?>
"><?php echo $_smarty_tpl->tpl_vars['gmtr']->value['nombre'];?>
</option>
            <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
        </select><br/>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'gmtr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gmtr']->value) {
?> 
        <input type="hidden"  id="val_<?php echo $_smarty_tpl->tpl_vars['gmtr']->value['id_producto'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['gmtr']->value['Precio'];?>
">
        <input type="hidden"  id="can_<?php echo $_smarty_tpl->tpl_vars['gmtr']->value['id_producto'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['gmtr']->value['cantidad'];?>
">
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <input type="hidden" id="can_pro" name="can_pro" value="">
        <label> Precio</label><br/>
        <input type="text" id="precio" name="precio" readonly required><br/>
        <label> Cantidad</label><br/>
        <input type="text" id="cantidad" onblur="subtotal(parseInt(this.value))" name="cantidad" required><br/>
        <label> Sub Total</label><br/>
        <input type="text" id="sub" name="sub" readonly><br/>
        <label> IVA</label><br/>
        <input type="text" id="iva" name="iva" onblur="caliva(parseInt(this.value))"><br/>
        <label> Precio + IVA</label><br/>
        <input type="text" id="impuestos" name="impuestos" readonly><br/>
        <label> Descuento</label><br/>
        <input type="number" id="iva" name="descuento"  onblur="caltotal(this.value)"><br/>
        <label> Total</label><br/>
        <input type="text" id="total" name="total" readonly><br/>
        <input type="submit" value="CREAR PRODUCTO">
    </form>
    <?php echo $_smarty_tpl->tpl_vars['tabla_html']->value;?>

</div>
<?php echo '<script'; ?>
>
    function cargarPrecio(id) {
        var precio = '';
        var cantidad = '';
        precio = $("#val_" + id).val();
        cantidad = $("#can_" + id).val();
        $("#precio").val(precio);
        $("#can_pro").val(cantidad);
        $("#sub").val('');
        $("#cantidad").val('');
    }
    function validaNombre(nombre) {
        if (nombre.toLowerCase() == 'brayan' || nombre.toLowerCase() == 'brayan') {
            alert("Al " + nombre.toUpperCase() + " no se le puede vender");
            $("#nombre").val('');
        }
        if (nombre.toLowerCase() == 'julieth') {
            alert("A la " + nombre.toUpperCase() + " no se le puede vender");
            $("#nombre").val('');
        }
    }
    function subtotal(val) {
        if (val > $("#can_pro").val()) {
            alert('Supera la cantidad en inventario maximo para compra ' + $("#can_pro").val());
            $("#sub").val('');
            return false;
        }
        if (val > 0) {
            var precio = '';
            precio = $("#precio").val() * val;
            $("#sub").val(precio);
        }
    }

    function caliva(iva) {
        if (iva > 0) {
            var precio = '';
            precio = (($("#sub").val() * iva) / 100 + parseInt($("#sub").val()));
            $("#impuestos").val(precio);
        } else {
            $("#impuestos").val($("#precio").val());
        }
    }
    function caltotal(valor) {
        if (valor <= $("#impuestos").val) {
            var des = '';
            des = ($("#impuestos").val() - valor);
            $("#total").val(des);
        } else {
            $("#total").val($("#impuestos").val());
            alert('descuento no valido');
        }
    }
<?php echo '</script'; ?>
>
</body>
</html>        <?php }
}
