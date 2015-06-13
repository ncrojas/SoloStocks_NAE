<?php
$oUsuario=new Usuario();
?>
<form method="post" action="accform/accProductoEliminar.php">
<?php
While($Registro=$oUsuario->Selecciona()){

?>
<input type="checkbox" name=elimina<?=$Registro->Idacceso()?> value="<?=$Registro->Idacceso()?>">
<?=$Registro->Nombre()?>
<br>
<?php
}

?>
<input type="submit" value="Eliminar">
</form>