<?php
$oProveedor=new Proveedor();
?>
<form method="post" action="accform/accProveedorEliminar.php">
<?php
While($Registro=$oProveedor->Selecciona()){?>
	
<input type="checkbox" name="elimina<?=$Registro->getIdProveedor()?>" value="<?=$Registro->getIdProveedor()?>">



<?=$Registro->getNombre()?>/<?=$Registro->getPais()?>
<br>
<?php
}

?>
<input type="submit" value="Eliminar">
</form>