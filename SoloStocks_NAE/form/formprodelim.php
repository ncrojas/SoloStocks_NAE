<?php
$oProducto=new Producto();
?>
<form method="post" action="accform/accProductoEliminar.php">
<?php
While($Registro=$oProducto->Selecciona()){

?>
<input type="checkbox" name=elimina<?=$Registro->getCodigo()?> value="<?=$Registro->getCodigo()?>">
<?=$Registro->getCodigo()?>/<?=$Registro->getDescripcion()?>
<br>
<?php
}

?>
<input type="submit" value="Eliminar">
</form>